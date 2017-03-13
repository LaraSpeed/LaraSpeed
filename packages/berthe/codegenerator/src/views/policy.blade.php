@extends("policyMaster")

@section("namespace"){{ucfirst($table["title"])}}@endsection

@section("model"){{ucfirst($table["title"])}}@endsection

@section("viewModelParam"){{ucfirst($table["title"])}} ${{"model"}}@endsection

@section("viewContent")@include("policy.viewPolicy", ["table" => $table, "config" => $config, "acl" => $acl])@endsection

@section("createModelParam"){{ucfirst($table["title"])}} ${{"model"}}@endsection

@section("createContent")@include("policy.createPolicy", ["table" => $table, "config" => $config, "acl" => $acl])@endsection

@section("updateModelParam"){{ucfirst($table["title"])}} ${{"model"}}@endsection

@section("updateContent")@include("policy.updatePolicy", ["table" => $table, "config" => $config, "acl" => $acl])@endsection

@section("deleteModelParam"){{ucfirst($table["title"])}} ${{"model"}}@endsection

@section("deleteContent")@include("policy.deletePolicy", ["table" => $table, "config" => $config, "acl" => $acl])@endsection