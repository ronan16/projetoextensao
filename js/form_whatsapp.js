
document.querySelector('#ag_enviar').addEventListener('click',function(){


 let nome = document.querySelector('#ag_nome').value;
 let fone = document.querySelector('#ag_fone').value;
 let cidade = document.querySelector('#ag_cidade').value;
 let assunto = document.querySelector('#ag_assunto').value;
 
let url = ("https://api.whatsapp.com/send?phone=5543996922801&text="+
			"Gostaria de realizar um agendamento com a Empresa Junior."+
			"%0A Meu nome: " +nome + 
			"%0A Meu telefone pra contato : "+ fone +
			"%0A Sou da cidade:  " + cidade+
			"%0A Quero falar sobre: "+ assunto );
window.open(url);

});