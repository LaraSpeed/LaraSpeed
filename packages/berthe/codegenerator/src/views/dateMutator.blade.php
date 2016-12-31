    {!! "function set".(Berthe\Codegenerator\Utils\Helper::camelize($attrName))."Attribute($"."value){" !!}

        {!! "$"."val = explode(\"-\", $"."value);" !!}

        {!! "if(count($"."val) < 2)" !!}
            {!! "$"."val = explode(\"/\", $"."value);" !!}

        {!! "$"."value = \"$"."val[2]-$"."val[0]-$"."val[1]\";" !!}
        {!! "$"."this->attributes['".$attrName."'] = date(\"Y-m-d\", strtotime($"."value));" !!}

    {!! "}" !!}

    {!! "function get".(Berthe\Codegenerator\Utils\Helper::camelize($attrName))."Attribute($"."value){" !!}

        {!! "return date(\"m-d-Y\", strtotime($"."value));" !!}

    {!! "}" !!}