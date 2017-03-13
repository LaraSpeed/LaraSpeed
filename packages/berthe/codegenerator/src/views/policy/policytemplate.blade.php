${!! "lvRole = $"."user->role;" !!}
${!! "lvAccessibleTables = (new ACLBO(ACLFactory::getACL()))->getAccessibleTables($"."lvRole);" !!}

if(ACLSpecificOperation::canAccessTable(ACLFactory::getACL(), ${{"lvRole"}}, "{{$table["title"]}}")){

if(str_contains(ACLSpecificOperation::getDroit(ACLFactory::getACL(), ${{"lvRole"}}, "{{$table["title"]}}"), "{!! $droit !!}")){
return true;
}
}

return false;