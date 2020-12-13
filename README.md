## My Command 
return redirect()->route('your route name')->with('message','Data added Successfully');

return redirect()->route('your route name')->with('error','Data Deleted');

return redirect()->route('your route name')->with('Warning','Are you sure you want to delete? ');

return redirect()->route('your route name')->with('info','This is xyz information');
