
$(document).ready(function () {
  var json = "";
  $(".select2").select2({
    ajax: {
      url: 'https://www.alphavantage.co/query',
      delay: 1000, // wait 250 milliseconds before triggering the request
      data: function (params) {
        var query = {
          function: "SYMBOL_SEARCH",
          keywords: params.term,
          apikey: '8DSYA1BKV2Z50KMN'
        }
        // Query parameters will be ?search=[term]&type=public
        return query;
      },
      processResults: function (data) {

        // {id: "S", text: "Sprint Corporation", 3. type: "Equity", 4. region: "United States", 5. marketOpen: "09:30", …}
        // Tranforms the top-level key of the response object from 'items' to 'results'


        if (data) {
          data = JSON.parse(JSON.stringify(data).split('"1. symbol":').join('"id":'));
          data = JSON.parse(JSON.stringify(data).split('"2. name":').join('"text":'));
        } else
          console.log(data);
        return {
          results: data.bestMatches
        };
      }
    }
  });

  $.getJSON("rules.json", function (data) {
    json = data;
  });

  $('#nse').click(function () {
    if (this.className == "btn btn-dormant") {
      toggleClasses("nse", "mcx", this.className);
      var rules = _.findWhere(json, { id: "nse" });
      applyRules(rules, "radio", "nse");
    }
  });

  $('#mcx').click(function () {
    if (this.className == "btn btn-dormant") {
      toggleClasses("mcx", "nse", this.className);
      var rules = _.findWhere(json, { id: "mcx" });
      applyRules(rules, "radio", "mcx");
    }
  });

  function applyRules(rules, element, sourceId) {
    switch (element) {
      case "radio":
        $.each(rules.radio_disabled, function (key, value) {
          $("#" + value).attr("disabled", true);
        });

        $.each(rules.radio_show, function (key, value) {
          $("#" + value).attr("disabled", false);
        });

        if (sourceId == "nse") {
          // $("#commodity").prop("checked",false); 
          $("#equities").prop("checked", true);
        }
        else {
          // $("#equities").prop("checked",false);
          $("#commodity").prop("checked", true);
        }

        break;
      case "div":
        $.each(rules.div_disabled, function (key, value) {
          $("#" + value).hide();
        });

        $.each(rules.div_show, function (key, value) {
          $("#" + value).show();
        });
      default:
        break;
    }
  }

  $('input[type=radio][name=segment]').change(function () {
    var id = this.id;
    var rules = _.findWhere(json, { id: this.id });
    applyRules(rules, "div", id);
  });

  $('input[type=radio][name=instrument]').change(function () {
    var id = this.id;
    var rules = _.findWhere(json, { id: this.id });
    applyRules(rules, "div", id);
  });

});
function toggleClasses(idOfSelected, idOfAdjacent, className) {
  if (className == "btn btn-selected") {
    $("#" + idOfSelected).removeClass(className);
    $("#" + idOfSelected).addClass("btn btn-dormant");
    $("#" + idOfAdjacent).removeClass("btn btn-dormant");
    $("#" + idOfAdjacent).addClass(className);
  }
  $("#" + idOfSelected).removeClass(className);
  $("#" + idOfSelected).addClass("btn btn-selected");
  $("#" + idOfAdjacent).removeClass("btn btn-selected");
  $("#" + idOfAdjacent).addClass(className);

}

function LoadSymbol() {
  /*$.ajax({
    url:'get_marks.php',
    type:'post',
    data:{'rollNo':rollNo},
    success:function(data){
      $("#tbody").html(data);
    }
  });*/
}
