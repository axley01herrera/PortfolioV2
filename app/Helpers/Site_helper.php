<?php
    function setLanguage($lang)
    {
        $request = \Config\Services::request();

        if(empty($lang))
            $request->setLocale('es');
        else
            $request->setLocale($lang);
    }
