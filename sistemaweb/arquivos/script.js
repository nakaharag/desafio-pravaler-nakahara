 $(document).ready(function() {
     lerDados();
     loadInputs();
 });
 
 $("#btn_add_nova_instituicao").click(function(){
    $('#form_um input').val("");
    $('#t').val('instituicao');
    $('.instituicao').show();
    $('.curso').hide();
    $('.aluno').hide();
 });
 $("#btn_add_novo_curso").click(function(){
    $('#form_um input').val("");
    $('#t').val('curso');
    $('.curso').show();
    $('.instituicao').hide();
    $('.aluno').hide();
 });
 $("#btn_add_novo_aluno").click(function(){
    $('#form_um input').val("");
    $('#t').val('aluno');
    $('.aluno').show();
    $('.instituicao').hide();
    $('.curso').hide();
 });
 $("#btn-adicionar").click(function(){
 
    var serializeDados = $('#form_um').serialize();
  
    $.ajax({
        url: './arquivos/adiciona.php',
        dataType: 'html',
        type: 'POST',
        data: serializeDados,
        complete: function() {
            reloadDT();
        }
    }); 
 });
 
 $("#btn-atualizar").click(function(){
 
    var serializeDados = $('#form_um').serialize();
  
    $.ajax({
        url: './arquivos/atualiza.php',
        dataType: 'html',
        type: 'POST',
        data: serializeDados,
        complete: function() {
            reloadDT();
        }
    }); 
 });
 
 $("#btn-deletar").click(function(){

    var serializeDados = $('#form_um').serialize();
  
    $.ajax({
        url: './arquivos/delete.php',
        dataType: 'html',
        type: 'POST',
        data: serializeDados,
        complete: function() {
            reloadDT();
        }
    }); 
 });
 
 
 function lerDados() {
 $('#instituicao_table').DataTable({
    "bProcessing": true,
    "order": [[ 1, "asc" ]],
    "columnDefs": [
        {
            "targets": [ 0 ],
            "visible": false
        }
    ],
    "serverSide": true,
    "searching": false,
    "oLanguage": {
                "sProcessing":   "Processando...",
                "sLengthMenu":   "Mostrar _MENU_ registros",
                "sZeroRecords":  "Não foram encontrados resultados",
                "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                "sInfoFiltered": "",
                "sInfoPostFix":  "",
                "sSearch":       "Buscar:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext":     "Seguinte",
                    "sLast":     "Último"
                }
    },
     "ajax":{
        url :"./arquivos/ler_dados.php?t=instituicao",
        type: "post"
      },
      "initComplete": function (){
          $('#instituicao_table').on("click", "tr[role='row']", function(){
              var dtTable = $('#instituicao_table').dataTable();
              var position = dtTable.fnGetPosition(this);
              var hiddenColumnValue = dtTable.fnGetData(position)[0];
              updateModal(hiddenColumnValue, 'instituicao');
          });
      }
    }); 

 $('#curso_table').DataTable({
    "bProcessing": true,
    "order": [[ 1, "asc" ]],
    "columnDefs": [
        {
            "targets": [ 0 ],
            "visible": false
        }
    ],
    "serverSide": true,
    "searching": false,
    "oLanguage": {
                "sProcessing":   "Processando...",
                "sLengthMenu":   "Mostrar _MENU_ registros",
                "sZeroRecords":  "Não foram encontrados resultados",
                "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                "sInfoFiltered": "",
                "sInfoPostFix":  "",
                "sSearch":       "Buscar:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext":     "Seguinte",
                    "sLast":     "Último"
                }
    },
     "ajax":{
        url :"./arquivos/ler_dados.php?t=curso",
        type: "post"
      },
      "initComplete": function (){
          $('#curso_table').on("click", "tr[role='row']", function(){
              var dtTable = $('#curso_table').dataTable();
              var position = dtTable.fnGetPosition(this);
              var hiddenColumnValue = dtTable.fnGetData(position)[0];
              $('#t').val('curso');
              updateModal(hiddenColumnValue, 'curso');
          });
      }
    }); 
 $('#aluno_table').DataTable({
    "bProcessing": true,
    "order": [[ 1, "asc" ]],
    "columnDefs": [
        {
            "targets": [ 0 ],
            "visible": false
        }
    ],
    "serverSide": true,
    "searching": false,
    "oLanguage": {
                "sProcessing":   "Processando...",
                "sLengthMenu":   "Mostrar _MENU_ registros",
                "sZeroRecords":  "Não foram encontrados resultados",
                "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                "sInfoFiltered": "",
                "sInfoPostFix":  "",
                "sSearch":       "Buscar:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext":     "Seguinte",
                    "sLast":     "Último"
                }
    },
     "ajax":{
        url :"./arquivos/ler_dados.php?t=aluno",
        type: "post"
      },
      "initComplete": function (){
          $('#aluno_table').on("click", "tr[role='row']", function(){
              var dtTable = $('#aluno_table').dataTable();
              var position = dtTable.fnGetPosition(this);
              var hiddenColumnValue = dtTable.fnGetData(position)[0];
              updateModal(hiddenColumnValue, 'aluno');
          });
      }
    }); 
 }

 function updateModal(id, type){
     $('#form_um input').val("");
     $.post("./arquivos/ler_detalhes.php", {
             id: id,
             type: type
         },
         function (data, status) {
             // PARSE json data
             var dados = JSON.parse(data);
             if(type == "instituicao"){
                $('.instituicao').show();
                $('.curso').hide();
                $('.aluno').hide();
                $('#t').val('instituicao');
                $("#hidden_instituicao_id").val(dados.id_instituicao);
                $("#nome_instituicao").val(dados.nome);
                $("#cnpj_instituicao").val(dados.cnpj);
                $("#status_instituicao").val(dados.status);

             } else if(type == "curso") {
                $('.curso').show();
                $('.instituicao').hide();
                $('.aluno').hide();
                $('#t').val('curso');
                $("#hidden_curso_id").val(dados.id_curso);
                $("#nome_curso").val(dados.nome);
                $("#duracao_curso").val(dados.duracao);
                $("#status_curso").val(dados.status);
                $("#instituicao_curso").val(dados.id_instituicao);
             } else {
                $('.aluno').show();
                $('.instituicao').hide();
                $('.curso').hide();
                $('#t').val('aluno');
                $("#hidden_aluno_id").val(dados.id_aluno);
                $("#nome_aluno").val(dados.nome);
                $("#cpf_aluno").val(dados.cpf);
                $("#nascimento_aluno").val(dados.data_nasc);
                $("#email_aluno").val(dados.email);
                $("#status_aluno").val(dados.status);
                $("#celular_aluno").val(dados.celular);
                $("#bairro_aluno").val(dados.bairro);
                $("#uf_aluno").val(dados.uf);
                $("#endereco_aluno").val(dados.endereco);
                $("#numero_aluno").val(dados.numero);
                $("#cidade_aluno").val(dados.cidade);
                $("#curso_aluno").val(dados.id_curso);
             }
         }
     );
     // Open modal popup
     $("#modal").modal("show");
 }

 function reloadDT(){
 
 var table = $('#curso_table').DataTable();
 var table2 = $('#instituicao_table').DataTable();
 var table3 = $('#aluno_table').DataTable();

 $('#modal').modal('hide');

 table.ajax.reload();
 table2.ajax.reload();
 table3.ajax.reload();
 
 loadInputs();
 }
 
 function loadInputs(){
    $("#instituicao_curso").html("");
    $("#curso_aluno").html("");
    $.post("./arquivos/carregar_inputs.php",
       function (data, status) {
          var dados = JSON.parse(data);
          $("#instituicao_curso").append(dados.instituicao);
          $("#curso_aluno").append(dados.curso);
    });
 }