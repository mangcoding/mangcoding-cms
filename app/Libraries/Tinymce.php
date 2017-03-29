<?php

namespace App\Libraries;
use Illuminate\Support\ServiceProvider;

class Tinymce {
    protected $folder;
    protected $param;

    function __construct($folder, $param="") {
        $this->folder = $folder;
        if ($param == "") {
            $this->param = [
                "selector" => ".tinymce",
                "language" => 'en_GB',
                "theme" => "modern",
                "skin" => "lightgray",
                "plugins" => [
                     "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                     "save table contextmenu directionality emoticons template paste textcolor"
                ],
                "toolbar1" => 'bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',

                "autosave_ask_before_unload" =>"false",
                "external_filemanager_path"=> $this->folder."/plugins/filemanager/",
                "filemanager_title"=>"File Manager",
                "filemanager_access_key"=>md5("no3k4s3p@okPis4N!!"),
                "external_plugins"=> ["filemanager"=> $this->folder."/plugins/filemanager/plugin.min.js"]
            ];
        } else $this->param = $param;
        return $this;
    }
    public  function load() {
        $url = '<script type="text/javascript" src="'.$this->folder.'/tinymce.min.js"></script>
        <script type="text/javascript">
            tinymce.init(
                '.json_encode($this->param).'
            );
         </script>';
         return $url;
    }
} 