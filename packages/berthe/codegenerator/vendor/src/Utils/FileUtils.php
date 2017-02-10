<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 02/10/16
 * Time: 12:18 م
 *
 * This class is a Kind of Utility class for files
 */

namespace Berthe\Codegenerator\Utils;

use Berthe\Codegenerator\Contrats\NormalizeInterface;

class FileUtils
{
    /**
     * Helper function used to normalize to multiple file.
     * @param $toPrepend
     * @param $paths
     * @param $interfaceNormalize
     */
    public static function normalizeFile($toPrepend, $paths, NormalizeInterface $interfaceNormalize){
        foreach ($paths as $path){
            $interfaceNormalize->normalize($toPrepend, $path);
        }
    }

    /**
     * Prepends String to file.
     * @param $toPrepend
     * @param $path
     */
    public static function prependString($toPrepend, $path){
        $content = file_get_contents($path);
        file_put_contents($path, "$toPrepend".$content);
        chmod($path, 0777);
    }

    /**
     * Appends String to file.
     * @param $toAppend
     * @param $path
     */
    public static function appendString($toAppend, $path){
        $content = file_get_contents($path);
        file_put_contents($path, $content."$toAppend");
        chmod($path, 0777);
    }
}

/**
 * <div class="row">
<div class="col-md-2">
<label class="text-primary">Categories : </label>
</div>

<div class="col-md-5">
<select class="form-control" multiple="multiple" size="10" name="duallistbox_demo1[]">
@forelse(\App\Category::all() as  $category)
<option value="{{$category->category_id}}">
{{$category->name}}
</option>
@empty
<option value="-1">No Category</option>
@endforelse
</select>
</div>
</div>
<script>
var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox();
$("#demoform").submit(function() {
alert($('[name="duallistbox_demo1[]"]').val());
return false;
});
</script>
 */