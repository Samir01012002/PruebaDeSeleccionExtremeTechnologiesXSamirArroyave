console.log(new Date().getTime('23-05-2021'));
console.log(new Date(1621475617412))
$(document).ready(function() {
  let user = getUserData();
  if(user.rol == 'ADMIN'){
    listPQRByAdmin();
  }else{
    listPQRByUser();
  }
  $('#createPQRForm').submit(function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: 'views/handlers/homeHandler.php?createPQR',
      data: $(this).serialize(),
      success: function(response){
        var jsonData = JSON.parse(response);
        //console.log(JSON.parse(jsonData.data));
        if (jsonData.success) {
          location.href = location.href;
        }else{
          alert('Error al crear un PQR');
        }
      }
    });
  });
});

$(function() { 
  $('#downloadReportPQRAdmin').click(function() {
    var options = {
    };
    var pdf = new jsPDF('p', 'pt', 'letter');
    pdf.addHTML($("#tableDataPQRAdmin"), 15, 15, options, function() {
      pdf.save('reportePQR.pdf');
    });
  });
});

$(function() { 
  $('#downloadReportPQRUser').click(function() {
    var options = {
    };
    var pdf = new jsPDF('p', 'pt', 'letter');
    pdf.addHTML($("#tableDataPQRUser"), 15, 15, options, function() {
      pdf.save('reportePQR.pdf');
    });
  });
});

function listPQRByUser(){
  let user = getUserData();
  $(document).ready(function() {
    $.ajax({
      type: "GET",
      url: `views/handlers/homeHandler.php?listPQRByUserToken&userToken=${user.userToken}`,
      success: function(response){
        var jsonData = JSON.parse(response);
        var html = '';
        let resultData = JSON.parse(JSON.parse(jsonData.data));
        if (resultData.length) {
          let button = '';
          for (let index = 0; index < resultData.length; index++) {
            if (resultData[index].status == 'Nuevo') {
              button = `<button class="btn btn-danger"onclick="deletePQR(${resultData[index].id})"> X </button>`;
            }else{
              button = 'En este estado no hay acciones'
            }
            html += `
              <tr>
                <td> ${index + 1} </td>
                <td> ${resultData[index].type} </td>
                <td width="100"><div style="width: 100; overflow: auto"> ${resultData[index].subject} </div></td>
                <td> ${resultData[index].userName} </td>
                <td class="${checkStatus(resultData[index].status)}"> ${resultData[index].status} </td>
                <td> ${resultData[index].creationDate} </td>
                <td> ${resultData[index].deadline} </td>
                <td> ${button} </td>
              </tr>
            `;
          }
        }else{
          html += `
              <tr>
                <td colspan='7'><center> No hay PQR </center></td>
              </tr>
            `;
        }
        $("#tablePQRUserId").html(html);
      }
    });
  });
}

function listPQRByAdmin(){
  let user = getUserData();
  $(document).ready(function() {
    $.ajax({
      type: "GET",
      url: `views/handlers/homeHandler.php?listPQRByAdminRol`,
      success: function(response){
        var jsonData = JSON.parse(response);
        var html = '';
        let resultData = JSON.parse(JSON.parse(jsonData.data));
        if (resultData.length) {
          let button = '';
          for (let index = 0; index < resultData.length; index++) {
            if (resultData[index].status == 'Nuevo') {
              button = `<button class="btn btn-success"onclick="startPQR(${resultData[index].id})"> Iniciar </button>`;
            }else if(resultData[index].status == 'En progreso'){
              button = `<button class="btn btn-warning" onclick="closePQR(${resultData[index].id})"> Cerrar </button>`;
            }else if(resultData[index].status == 'Cerrado'){
              button = 'En este estado no hay acciones'
            }
            html += `
              <tr>
                <td> ${index + 1} </td>
                <td> ${resultData[index].type} </td>
                <td width="100"><div style="width: 100; overflow: auto"> ${resultData[index].subject} </td>
                <td> ${resultData[index].userName} </td>
                <td class="${checkStatus(resultData[index].status)}"> ${resultData[index].status} </td>
                <td> ${resultData[index].creationDate} </td>
                <td> ${resultData[index].deadline} </td>
                <td>
                  ${button}
                </td>
              </tr>
            `;
          }
        }else{
          html += `
              <tr>
                <td colspan='8'><center> No hay PQR </center></td>
              </tr>
            `;
        }
        $("#tablePQRAdmin").html(html);
      }
    });
  });
}

function checkStatus(status){
  if (status == 'Cerrado') {
    return 'bg-danger text-white';
  }else if(status == 'En progreso'){
    return 'bg-warning text-black';
  }
  return 'bg-success text-black';
}

function getUserData(){
  return JSON.parse(localStorage.getItem('userData'));
}

function startPQR($id){
  $(document).ready(function() {
    $.ajax({
      type: "POST",
      url: `views/handlers/homeHandler.php?startPQRById&PQRId=${$id}`,
      success: function(response){
        var jsonData = JSON.parse(response);
        console.log(JSON.parse(jsonData.data));
        if (jsonData.success) {
          location.href = location.href;
        }else{
          alert('Error');
        }
      }
    });
  });
}

function deletePQR($id){
  $(document).ready(function() {
    $.ajax({
      type: "POST",
      url: `views/handlers/homeHandler.php?deletePQRById&PQRId=${$id}`,
      success: function(response){
        var jsonData = JSON.parse(response);
        console.log(JSON.parse(jsonData.data));
        if (jsonData.success) {
          location.href = location.href;
        }else{
          alert('Error');
        }
      }
    });
  });
}

function closePQR($id){
  $(document).ready(function() {
    $.ajax({
      type: "POST",
      url: `views/handlers/homeHandler.php?closePQRById&PQRId=${$id}`,
      success: function(response){
        var jsonData = JSON.parse(response);
        console.log(JSON.parse(jsonData.data));
        if (jsonData.success) {
          location.href = location.href;
        }else{
          alert('Error');
        }
      }
    });
  });
}