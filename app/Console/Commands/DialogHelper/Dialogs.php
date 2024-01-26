<?php

namespace App\Console\Commands\DialogHelper;

use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Console\Command;
use SimpleXMLElement;

class Dialogs
{
    public static function askFile($context){
        $filePath = null;
        $file = null;
        while(true) {
            try {
                $filePath = $context->ask('Please provide the path to the file: ');
                if ($filePath === null || trim($filePath) === '') {
                    throw new Exception('');
                }
                $file = simplexml_load_file($filePath);
                return $file;
                break;
            } catch (Exception $e) {
                $context->error('File not found!');
            }
        }

    }

    public static function confirmContinue($context) :bool{
        return $context->confirm('Do you wish to continue? y/n');
    }
}
