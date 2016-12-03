    {!! "function get".(Berthe\Codegenerator\Utils\Helper::camelize($attrName))."Attribute($"."value){" !!}

        {!! "if(strlen($"."value) > $length && session('mutate', 'none') == '1') {" !!}
            {!! "return substr($"."value, 0, $length).\"...\";" !!}
        {!! "}" !!}

        {!! "return $"."value;" !!}
    {!! "}" !!}