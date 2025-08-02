$(document).ready(function () {
  
  let index = 0;

  function addRow(data = {}) {
    let row = `
        <tr id="row${index}">
          <td><input id="item${index}" type="text" value="${data.Item || ""}" placeholder="Item"/></td>
          <td><input id="hsn${index}" type="text" value="${data.HsnSac || ""}" placeholder="HSN"/></td>
          <td><input id="gst${index}" type="number" value="12.5" disabled /></td>
          <td><input id="qty${index}" type="number" value="${data.Quantity || 0}" placeholder="Qty"/></td>
          <td><input id="rate${index}" type="number" value="${data.Rate || 0}" placeholder="Rate"/></td>
          <td><input id="total${index}" type="number" value="${data.Total || 0}" disabled /></td>
          <td><input id="cgst${index}" type="number" value="${data.CGST || 0}" disabled /></td>
          <td><input id="sgst${index}" type="number" value="${data.SGST || 0}" disabled /></td>
          <td><input id="grand${index}" type="number" value="${data.GrandTotal || 0}" disabled /></td>
          <td><button class="btn btn-danger removeBtn" data-index="${index}"><i class="bi bi-x"></i></button></td>
        </tr>`;

    $("#invoiceBody").append(row);
    calculateTax(index);
    index++;
  }

  function calculateTax(i) {
    $(`#qty${i}, #rate${i}`).on("input", function () {
      
      let qty = parseFloat($(`#qty${i}`).val()) || 0;
      let rate = parseFloat($(`#rate${i}`).val()) || 0;
      let gst = 12.5;
      let total = qty * rate;
      let cgst = (total * gst) / 100 / 2;
      let sgst = (total * gst) / 100 / 2;
      let grand = total + cgst + sgst;

      $(`#total${i}`).val(total.toFixed(2));
      $(`#cgst${i}`).val(cgst.toFixed(2));
      $(`#sgst${i}`).val(sgst.toFixed(2));
      $(`#grand${i}`).val(grand.toFixed(2));

      updateTotals();
    });
  }

  function updateTotals() {
    let totalAmount = 0,
      totalCGST = 0,
      totalSGST = 0;
    $("#invoiceBody tr").each(function () {
      
      let rowId = $(this).attr("id").replace("row", "");
      let qty = parseFloat($(`#qty${rowId}`).val()) || 0;
      let rate = parseFloat($(`#rate${rowId}`).val()) || 0;
      let cgst = parseFloat($(`#cgst${rowId}`).val()) || 0;
      let sgst = parseFloat($(`#sgst${rowId}`).val()) || 0;
      
      totalAmount += qty * rate;
      totalCGST += cgst;
      totalSGST += sgst;
    });
    
    let gstTotal = totalCGST + totalSGST;
    let grandTotal = totalAmount + gstTotal;

    $("#totalAmount").text(totalAmount.toFixed(2));
    $("#totalCGST").text(totalCGST.toFixed(2));
    $("#totalGST").text(gstTotal.toFixed(2));
    $("#grandTotal").text(grandTotal.toFixed(2));
  }

  $("#add").click(function () {
    addRow();
  });

  $(document).on("click", ".removeBtn", function () {
    let rowId = $(this).data("index");
    $(`#row${rowId}`).remove();
    updateTotals();
  });

  $("#save").click(function () {
    let rows = $("#invoiceBody tr");
    let data = JSON.parse(localStorage.getItem("invoiceData")) || [];

    let newEntries = [];
    let allValid = true;

    rows.each(function () {
      let rowId = $(this).attr("id").replace("row", "");
      let item = $(`#item${rowId}`).val();
      let hsn = $(`#hsn${rowId}`).val();
      let qty = $(`#qty${rowId}`).val();
      let rate = $(`#rate${rowId}`).val();

      if (!item || !hsn || !qty || !rate) {
        allValid = false;
        return false;
      }

      let cgst = $(`#cgst${rowId}`).val();
      let sgst = $(`#sgst${rowId}`).val();
      let grand = parseFloat(qty) * parseFloat(rate) + parseFloat(cgst) + parseFloat(sgst);

      newEntries.push({
        Item: item,
        HsnSac: hsn,
        GSTRate: 12.5,
        Quantity: qty,
        Rate: rate,
        CGST: cgst,
        SGST: sgst,
        GrandTotal: grand.toFixed(2),
      });
    });

    if (!allValid) {
      alert("Please fill in all fields before saving!");
      return;
    }

    data = data.concat(newEntries);
    localStorage.setItem("invoiceData", JSON.stringify(data));
    displaySavedData();
    $("#invoiceBody").empty();
    updateTotals();
  });

  function displaySavedData() {
    let data = JSON.parse(localStorage.getItem("invoiceData")) || [];
    let table = `
          <tr>
            <th>Item</th><th>HSN</th><th>GST</th><th>Qty</th><th>Rate</th>
            <th>CGST</th><th>SGST</th><th>Grand Total</th><th>Action</th>
          </tr>`;

    data.forEach((item, i) => {
      
      table += `<tr>
                  <td>${item.Item}</td>
                  <td>${item.HsnSac}</td>
                  <td>${item.GSTRate}</td>
                  <td>${item.Quantity}</td>
                  <td>${item.Rate}</td>
                  <td>${item.CGST}</td>
                  <td>${item.SGST}</td>
                  <td>${item.GrandTotal}</td>
                  <td><button class="btn btn-danger deleteSaved" data-index="${i}"><i class="bi bi-trash"></i></button></td>
                </tr>`;
    });
    $("#savedTable").html(table);
  }

  $(document).on("click", ".deleteSaved", function () {
    let index = $(this).data("index");
    let data = JSON.parse(localStorage.getItem("invoiceData")) || [];
    data.splice(index, 1);
    localStorage.setItem("invoiceData", JSON.stringify(data));
    displaySavedData();
  });

  displaySavedData();
});
