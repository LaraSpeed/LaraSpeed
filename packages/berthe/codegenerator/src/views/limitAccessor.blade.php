{!! "function get".(Berthe\Codegenerator\Utils\Helper::camelize($attrName))."Attribute($"."value){" !!}

        {!! "if(strlen($"."value) > $length ) {" !!}
            {!! "return substr($"."value, 0, $length).\"...\";" !!}
        {!! "}" !!}

        {!! "return $"."value;" !!}
    {!! "}" !!}