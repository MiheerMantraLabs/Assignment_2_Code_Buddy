@include('includes.header')
<style>
    ol{
        /* list-style: none;
        margin: 0;
        padding: 0; */
    }
</style>
@include('includes.navbar')
@php
    $arr=[];
@endphp
@foreach ($catalogs as $row)
    @php
        $arr[$row['id']]['catelog_name']=$row['catelog_name'];
	    $arr[$row['id']]['parent_id']=$row['parent_id'];
    @endphp
@endforeach

{{-- function to print catalog in nested view --}}

<div class="container card mt-3 alert alert-success" style="white-space: wrap" role="alert">
    <h5><b><u>Calatogs</u></b></h5>
    <br>
    @php
        makeNestedView($arr,0);
    @endphp
</div>

@php
    function makeNestedView($arr,$parent,$level = 0,$prelevel = -1){
        foreach($arr as $id=>$data){
            if($parent==$data['parent_id']){
                if($level>$prelevel){
                    echo "<ul>";
                }
                if($level==$prelevel){
                    echo "</li>";
                }
                echo "<li class='p-2'>".$data['catelog_name'];
                $data_id = $id;
                $data_parent_id = $data['parent_id'];
                $data_catelog_name = $data['catelog_name'];
                echo "&nbsp;<a href='".url('/')."/create-catalog/".$data_id."/".$data_parent_id."'><button class='bi bi-plus'></button></a>&nbsp;&nbsp;&nbsp;";
                if($data['catelog_name'] != 'root'){
                    echo "&nbsp;<a href='".url('/')."/edit-catalog/".$data_id."/".$data_catelog_name."'><button class='bi bi-pencil'></button></a>&nbsp;&nbsp;&nbsp;";
                    echo "&nbsp;<a href='".url('/')."/delete-catelog/".$data_id."'><button class='bi bi-trash'></button></a>&nbsp;&nbsp;&nbsp;";
                }
                if($level>$prelevel){
                    $prelevel=$level;
                }
                $level++;
                makeNestedView($arr,$id,$level,$prelevel);
                $level--;	
            }
        }
        if($level==$prelevel){
            echo "</li></ul>";
        }
    }
@endphp

    

@include('includes.footer')