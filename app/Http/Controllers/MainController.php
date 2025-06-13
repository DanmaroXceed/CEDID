<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Data;
use App\Models\Movimiento;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\type;
use function Termwind\render;

class MainController extends Controller
{
    public function index()
    {
        return view('principal');
    }

    public function listado()
    {
        $query = DB::table('data')
            ->select('data.cedid')
            ->where('estado_ident', '!=', 'R');

        $data = $query->get();

        return view('cedulas', compact('data'));
    }

    public function cedulas()
    {
        $query = DB::table('data')
            ->select('*')  // Para obtener también la URL de la foto
            ->where('estado_ident', '!=', 'R');
        $data = $query->get();

        return view('cedulas', compact('data'));
    }

    public function login()
    {
        return view('login');
    }

    public function listado_admin(Request $request)
    {
        // Obtenemos el valor de la búsqueda
        $query = $request->get('query');

        // Construimos la consulta base
        $data = DB::table('data')
            ->leftjoin('fotos', 'data.foto_id', '=', 'fotos.id')
            ->select('data.*', 'fotos.url as foto_url')
            ->where('estado_ident', '!=', 'R');

        // Si hay un query, aplicamos el filtro
        if ($query) {
            $data->where('nombre', 'like', "%{$query}%");
        }

        // Obtenemos los resultados con paginación
        $data = $data->paginate(10);

        // Devolvemos la vista con los datos paginados
        return view('dashboard', compact('data'));
    }

    public function recuperado($dato)
    {
        try {
            $data = Data::findOrFail($dato);

            // 1) Determina la ruta correcta
            $filename = $data->cedid . '.jpg';
            $path = Storage::disk('public')->exists("cedulas/{$filename}")
                ? Storage::disk('public')->path("cedulas/{$filename}")
                : public_path("cedulas/{$filename}");

            if (! file_exists($path)) {
                throw new \Exception("Imagen no encontrada en ninguna ruta: {$path}");
            }

            // 2) Preparar fuente y texto
            $fontPath = public_path('Roboto-Regular.ttf');
            if (! file_exists($fontPath)) {
                throw new \Exception("Fuente TTF no encontrada en: {$fontPath}");
            }
            $text     = 'ENTREGADO';
            $size     = 80;
            $angle    = 45;   // grados
            $opacity  = 63;    // 0–127 en GD (127 es fully transparent), 63 ≈ 50%

            // 3) Intento con Intervention Image
            try {
                $manager = new ImageManager(new Driver());
                $img = $manager->read($path);
                $centerX = $img->width()  / 2;
                $centerY = $img->height() / 2;
                $img->text($text, $centerX, $centerY, function ($font) use ($fontPath, $size, $opacity, $angle) {
                    $font->file($fontPath);
                    $font->size($size);
                    $font->color([255, 0, 0, 0.4]); // 40% opacity
                    $font->align('center');
                    $font->valign('center');
                    $font->angle($angle);
                });
                $img->save($path);
            } catch (\Intervention\Image\Exceptions\DecoderException $ie) {
                // 4) Fallback puro GD si Intervention falla
                list($w, $h) = getimagesize($path);
                $gd = imagecreatefromjpeg($path);
                // rojo semi‑transparente
                $color = imagecolorallocatealpha($gd, 255, 0, 0, $opacity);
                // calcula caja del texto
                $box = imagettfbbox($size, $angle, $fontPath, $text);
                $textW = abs($box[4] - $box[0]);
                $textH = abs($box[5] - $box[1]);
                // centra
                $x = ($w - $textW) / 2;
                $y = ($h + $textH) / 2;
                imagettftext($gd, $size, $angle, $x, $y, $color, $fontPath, $text);
                imagejpeg($gd, $path, 90);
                imagedestroy($gd);
            }

            // 5) Si llegamos aquí, la imagen fue procesada: actualiza BD
            $data->estado_ident = 'R';
            $data->save();
            Movimiento::create([
                'user_id'     => Auth::id(),
                'descripcion' => 'El usuario ' . Auth::user()->name
                    . ' marcó como recuperado el elemento con ID ' . $dato,
            ]);

            return redirect()->route('listado-admin')->with([
                'success' => 'Estado actualizado correctamente',
                'cedula' => $data->cedid
            ]);
        } catch (\Exception $e) {
            Log::error("Error al marcar como recuperado el ID {$dato}: " . $e->getMessage(), [
                'exception_class' => get_class($e),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                // 'trace' => $e->getTraceAsString(),
                'cedid' => $data->cedid ?? 'N/D',
                'image_path' => $path ?? 'N/D',
                'user_id' => Auth::user()->id ?? 'N/A',
                'user_name' => Auth::user()->name ?? 'N/A',
            ]);

            return redirect()->back()->with('error', 'Hubo un problema al actualizar el estado. Revisa el log para más detalles.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function captura()
    {
        return view('captura');
    }

    public function usrs()
    {
        $usrs = DB::table('users')
            ->select('name', 'email', 'type')
            ->where('name', '!=', 'AdminCEDID')
            ->get();

        return view('usrs', compact('usrs'));
    }

    public function reg_usr()
    {
        return view('reg-usr');
    }
}
