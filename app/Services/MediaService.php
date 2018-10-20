<?php
namespace App\Services;

use App\Media;

class MediaService
{
    const UPLOADS_PATH = '/uploads/';

    public static function getMedia($id) {

        $media = Media::find($id);

        if (!empty($media)) return $media;

        return null;
    }

    public static function uploadMedia($uploadedFile, $typeMedia)
    {
        $destinationPath = public_path(self::UPLOADS_PATH.request()->tenant);

        if (!is_dir($destinationPath)) mkdir($destinationPath, 0775, true);

        $filename = str_random(3).'_'.$uploadedFile->getClientOriginalName();
        $extension = $uploadedFile->getClientOriginalExtension();

        $data = [
            'filename' => $filename,
            'extension' => $extension,
            'path' => self::UPLOADS_PATH .request()->tenant .'/',
            'type' => $typeMedia,
        ];

        $uploadedFile->move($destinationPath, $filename);

        return Media::create($data);
    }

    public static function uploadMediaBase64($base64_string, $output_file, $typeMedia)
    {
        $destinationPath = public_path(self::UPLOADS_PATH);

        if (!is_dir($destinationPath)) mkdir($destinationPath, 0775, true);

        $filename = str_random(3).'_'.$output_file;
        $extension = explode('.', $output_file)[1];

        // open the output file for writing
        $ifp = fopen( $destinationPath.'/'.$filename, 'wb' );

        // split the string on commas
        // $data[ 0 ] == "data:image/png;base64"
        // $data[ 1 ] == <actual base64 string>
        $data = explode( ',', $base64_string );

        // we could add validation here with ensuring count( $data ) > 1
        fwrite( $ifp, base64_decode( $data[ 0 ] ) );

        // clean up the file resource
        fclose( $ifp );

        $data = [
            'filename' => $filename,
            'extension' => $extension,
            'path' => self::UPLOADS_PATH . '/',
            'type' => $typeMedia,
        ];

        return Media::create($data);
    }

    public static function destroyMedia($id){
        $media = Media::find($id);
        if ($media) @unlink($media->path.$media->filename);
        return Media::destroy($id);
    }
}
