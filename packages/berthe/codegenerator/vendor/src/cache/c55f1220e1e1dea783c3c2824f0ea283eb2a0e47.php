    <?php echo "function set".(Berthe\Codegenerator\Utils\Helper::camelize($attrName))."Attribute($"."value){"; ?>


        <?php echo "$"."val = explode(\"-\", $"."value);"; ?>


        <?php echo "if(count($"."val) < 2)"; ?>

            <?php echo "$"."val = explode(\"/\", $"."value);"; ?>


        <?php echo "$"."value = \"$"."val[2]-$"."val[0]-$"."val[1]\";"; ?>

        <?php echo "$"."this->attributes['".$attrName."'] = date(\"Y-m-d\", strtotime($"."value));"; ?>


    <?php echo "}"; ?>


    <?php echo "function get".(Berthe\Codegenerator\Utils\Helper::camelize($attrName))."Attribute($"."value){"; ?>


        <?php echo "return date(\"m-d-Y\", strtotime($"."value));"; ?>


    <?php echo "}"; ?>