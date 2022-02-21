// js 无限极展示部门demo
let json = [];
let depts = document.querySelector(".depts");
console.log(json)
function list(data) {
 
  html = "";
  var a=false;
  html += "<ul>";
  for (let i of data) {
     
   
           
        
    html += `<li><p>${i.name}</p>`;
     
    if (i.subs.length > 0) {
      html+=list(i.subs);
      
    } 
          
     

    html+="</li>";
  
  }
 
  html += "</ul>";
  return html;
}
depts.innerHTML=list(json);