/*******************
* 
* Simulador Hipotecario UPTC
* formulas para el calculo del interes hipotecario 
* Elaborado por grupo 2 
* Topicos avanzados de Ingenieria de software 
*
*********************/



  var i;
  var body = document.getElementsByTagName("body")[0];

//Función que restaura los valores de los campos a su estado original 
function limpiar(){
	var totalcapital=document.getElementById('ValorCredito');
	totalcapital.value='';
	var totalvivienda2=document.getElementById('ValorVivienda');
	totalvivienda2.value='';
	var lista=document.getElementById('lista');
	lista.defaultSelected;
}

function crearLista(){
	var sel = document.getElementById('lista');
      	var c;
      	for (c=60; c<=240; c++){
      		var opt = document.createElement('option');
	    	opt.value = c;
	    	opt.text = c;
	    	sel.add(opt);
    	}
}

function crearListaAnios(){
	var sel = document.getElementById('listaanios');
      	var c;
      	for (c=18; c<=100; c++){
      		var opt = document.createElement('option');
	    	opt.value = c;
	    	opt.text = c;
	    	sel.add(opt);
    	}
}

function calcularSimulacion(smmlv, minsub, maxsub, tasaInt, edad, tasaSub, tasaSeg, ingFam){
			//Valor del salario mímino 2017
			//var salariominimo=737717;
			var salariominimo=smmlv;
			//Rango mínimo para ser merecedor del subsidio
			//var minsubsidio=(salariominimo*70);
			var minsubsidio=(salariominimo*minsub);
			//Rango máximo para ser merecedor del subsidio
			//var maxsubsidio=(salariominimo*135);
			var maxsubsidio=(salariominimo*maxsub);
			//Variable que obtiene el valor obtenido en el campo Valor de la Vivienda
			var totalvivienda=document.getElementById('ValorVivienda').value;
	  		var table = document.createElement("table");
            //var descporc=0.34;
            var descporc=tasaSub/12;
            var valorinteres=0;	
            // Tasa del 10.8 anual representada en 0.9 mensual
            //var tasaint =0.9/100;
            var tasaint =(tasaInt/12)/100;
            var tasaintdesc= (tasaint-descporc)/100;	
            var totalcapital=document.getElementById('ValorCredito').value;
            var saldocapital=totalcapital;
            var lista=document.getElementById('lista');
            var plazo=lista.value;
            var int=0;
            var valorcuota=0;
            var valorcuotasubsidio=valorcuota;
            var totcap=0;
            var amortizacion=0;
            var subsidio=0;
            var interes=0;
            if(totalcapital=='' || totalvivienda==''){
            	alert('Por favor digite el valor del credito a a solicitar y de la vivienda y reintente!');
            }else{
	            table.border = '1';
	            var heading = new Array();
	            heading[0] = "Numero Cuota";
	            heading[1] = "Interes";
	            heading[2] = "Abono Capital";
	            heading[3] = "Subsidio";
	            heading[4] = "Valor Cuota";
	            heading[5] = "Valor Cuota Con Subsidio";
	            heading[6] = "Saldo";
	            var tr = table.insertRow();
	            for (k=0; k < heading.length; k++){
	            	var th = document.createElement('TH');
			        th.width = '75';
			        th.appendChild(document.createTextNode(heading[k]));
			        tr.appendChild(th);
	            }
	            //calcula el valor de la cuota fija
	            valorcuota=Math.floor((totalcapital*tasaint)/(1-Math.pow(1+tasaint,(-1*plazo)))*100)/100;
	            //Determina si aplica subsidio para viviendas VIS
	            
	            if ((totalvivienda >= minsubsidio) && (ingFam < (2*salariominimo)){
						subsidio= Math.round(valorcuota*0.034);	
				}else if ((ingFam < (2*salariominimo) || ingFam > (4*salariominimo)) && (totalvivienda >= minsubsidio || totalvivienda<=maxsubsidio)){ 
						subsidio= Math.round(valorcuota*0.034);	
				}
				else{
          				subsidio= 0;
          		}

	            for (i = 0; i < plazo; i++) {
		            var tr = table.insertRow();
		            var td = tr.insertCell();
		            td.width = '75';	
		            td.appendChild(document.createTextNode(i+1));
		            //calculo de intereses a pagar en el periodo 
		            intereses=Math.round(saldocapital * tasaint *100)/100;
		            //calculo de capital a pagar en el periodo
          	        amortizacion=Math.round((valorcuota-intereses)*100)/100;
          	        //calculo de saldo de capital a pagar en el prestamo
					saldocapital=Math.round((saldocapital-amortizacion)*100)/100;
					//calculo de subsidio  a descontar en el periodo según el monto del prestamo
          			var inttotal = parseInt(intereses);
		            td = tr.insertCell();
			        td.appendChild(document.createTextNode('$'+inttotal));
			        td = tr.insertCell();
			        var valcou= 0;
			        valcou= parseInt(valorcuota);
			        amortizacion = parseInt(amortizacion);
			        td.appendChild(document.createTextNode('$'+amortizacion));
			        td = tr.insertCell();
			        subsidio= parseInt(subsidio);
			        td.appendChild(document.createTextNode('$'+subsidio));
			        td = tr.insertCell();
			        td.appendChild(document.createTextNode('$'+valcou));
		            //Evalua si aplica en el pago de cuotas el subsidio 
		            if (i<84){
		            	       	td = tr.insertCell();
		            	       	var descsubsidio= valcou-subsidio;
			                	td.appendChild(document.createTextNode('$'+descsubsidio));
			       	}else{
			                	td = tr.insertCell();
			                	td.appendChild(document.createTextNode('$'+valcou));
		           	}
           			//saldocapital= totcap-(valcou*(i+1));
			        saldocapital= parseInt(saldocapital);
			        if (saldocapital <0 ){saldocapital=0;}
			        td = tr.insertCell();
			        td.appendChild(document.createTextNode('$'+saldocapital));
	                table.appendChild(tr);	
		    }
		    var mydinamictable = document.getElementById("myDynamicTable");
		    //var linea = document.createElement("hr");
		    //mydinamictable.appendChild(linea);
		    //var mydinamictable2 = document.getElementById("myDynamicTable");
		    
		    
		    mydinamictable.innerHTML="";     
			//var texto = document.createElement("h2");
		    //texto.innerHTML="El valor de la cuota es: $"+valcuo;
		    //mydinamictable.appendChild(texto);  	
		    mydinamictable.appendChild(table);
		    }
  }	

