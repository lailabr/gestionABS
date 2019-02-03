$(document).ready(function(){
    $("#Filieres").change(function(){
        var fils =$(this).val();
        $.get("Filieres.php?idfils="+fils,function(data){
            $("#divEtud").html(data);
        });
    });
    $("#FilieresCons").change(function(){
        var filsCons =$(this).val();
        $.get("EtudiantsConseil.php?idfilsCons="+filsCons,function(data){
            $("#divEtud").html(data);
        });
    });
    $("#FilieresProf").change(function(){
        var fil =$(this).val();
        $.get("TableEtudiantAmodifier.php?idfil="+fil,function(data){
            $("#divEtudAbs").html(data);
        });
    });


});