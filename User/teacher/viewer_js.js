function ind_bu_1() {
    id = document.getElementById("msid").innerText;
    document.location.href = '../student/set.php?sid='+id;
}


ind_bu_2_B = 0;
function ind_bu_2() {
    if(ind_bu_2_B == 0){
        ind_bu_2_B = 1;
        document.getElementById("ind_up_1").setAttribute("class","ind_up_v");
        document.getElementById("ind_up_2").setAttribute("class","ind_up_v");
    }else{
        ind_bu_2_B = 0;
        document.getElementById("ind_up_1").setAttribute("class","ind_up_h");
        document.getElementById("ind_up_2").setAttribute("class","ind_up_h");
    }
}


function hw_cb_1(){
    if(document.getElementById("hw_checkBox1").checked){
        document.location.href = "../student/set.php?sid="+id+"&overtime=1";
    }else{

    }
    //document.location.href = '../student/set.php?sid='+id;
}
