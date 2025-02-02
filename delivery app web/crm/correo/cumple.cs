		public void cumpleLecollezioni(string Usuario)
		{

			try
			{
				MailMessage mail = new MailMessage();
				SmtpClient SmtpServer = new SmtpClient("smtp.gmail.com");

				mail.From = new MailAddress("rdzalejandro316@gmail.com");
				mail.To.Add("alejandro-rdz-@hotmail.com");
				mail.Subject = "Feliz Cumpleaños " + Usuario;

				mail.IsBodyHtml = true;
				string htmlBody;

				htmlBody = "<!DOCTYPE html>" +
				"<html>" +
				"<head>" +
				"<meta charset='utf-8'>"+
	   			"<title>feliz cumpleaños</title>" +
				"<style type='text/css'>" +
				"html, body, div, span, applet, object, iframe,h1, h2, h3, h4, h5, h6, p, blockquote, pre,a, abbr, acronym, address, big, cite, code,del, dfn, em, img, ins, kbd, q, s, samp,small, strike, strong, sub, sup, tt, var,b, u, i, center,dl, dt, dd, ol, ul, li,fieldset, form, label, legend,table, caption, tbody, tfoot, thead, tr, th, td,article, aside, canvas, details, embed,figure, figcaption, footer, header, hgroup,menu, nav, output, ruby, section, summary,time, mark, audio, video {margin: 0;padding: 0;border: 0;font-size: 100%;vertical-align: baseline;}" +
				"article, aside, details, figcaption, figure,footer, header, hgroup, menu, nav, section {display: block;}" +
				"body {	line-height: 1;}ol, ul {list-style: none;}" +
				"blockquote, q {quotes: none;}blockquote:before, blockquote:after,q:before, q:after {	content: '';	content: none;}" +
				"table { border-collapse: collapse;border-spacing: 0;}a{  text-decoration:none;}" +
				"a { text-decoration:none;}" +
				".cuerpo{ position: absolute;}" +
				".card { -webkit-box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);-moz-box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);-ms-box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);-o-box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);  display: grid;  font-family: 'Trebuchet MS', sans-serif;  height: 200px;  margin: 20px auto;  width: 350px;}" +
				".front {  grid-template-columns: repeat(12, 1fr);  grid-template-rows: repeat(6, 1fr); background: red;}" +
				".front .blue {  background-color: #000000;  grid-column: 8 / span 5;  grid-row: 1 / span 6;}" +
				".front .yellow {  background-color: #000000;  grid-column: 1 / span 7;  grid-row: 1 / span 6;}" +
				".front .pink { background-color: #a28a44;  -webkit-clip-path: polygon(0% 0%, 100% 0%, 0% 100%); clip-path: polygon(0% 0%, 100% 0%, 0% 100%);  grid-row: 1 / span 3;  grid-column: 1 / span 11;  position: relative;  z-index: 2;}" +
				".front .dots { background: radial-gradient(#a28a44 20%, transparent 19%), radial-gradient(#a28a44 20%, transparent 19%), transparent;	background-size: 6px 6px;  background-position: 0 0, 3px 3px;  grid-column: 1 / span 12;  grid-row: 3 / span 4;  margin: 0 0 15px 20px; z-index: 1;}" +
				".front .personal-intro {  background: black;  color: white;  display: flex; flex-direction: column;  grid-column: 2 / span 10;  grid-row: 2 / span 4;  justify-content: center;  text-align: center;  z-index: 3;}" +
				".front .personal-intro p {  letter-spacing: 1px;  text-transform: uppercase;}" +
				".front .personal-intro p:first-of-type {  font-size: 18px;}" +
				".front .personal-intro p:last-of-type {  font-size: 8px;  margin-top: 5px;}" +
				".back {  grid-template-columns: repeat(12, 1fr);  grid-template-rows: repeat(12, 1fr);  height: 300px;  background-color: #a28a44;}" +
				".back .yellow {  background-color: #000000;  grid-column: 1 / span 9;  grid-row: 1 / span 3;}" +
				".back .top.dots {  background: radial-gradient(#000000 20%, transparent 19%), radial-gradient(#000000 20%, transparent 19%), transparent; background-size: 6px 6px;  background-position: 0 0, 3px 3px;  grid-column: 8 / span 6;  grid-row: 2 / span 3;}" +
				".back .personal-info {  grid-column: 2 / span 8;  grid-row: 5 / span 6;}" +
				".back .personal-info p {  font-size: 12px;}" +
				".back .personal-info p:first-of-type {  font-size: 20px;  font-weight: bold;  letter-spacing: 1px;  text-transform: uppercase;}" +
				".back .personal-info p:nth-of-type(2) {  font-size: 12px;  margin-bottom: 15px;}" +
				".back .bottom.dots {  background: radial-gradient(#000000 20%, transparent 19%), radial-gradient(#000000 20%, transparent 19%), transparent; background-size: 6px 6px;  background-position: 0 0, 3px 3px;  grid-column: 1 / span 8;  grid-row: 11 / span 2;  z-index: 2;}" +
				".back .pink {  background-color: #000000;  grid-column: 9 / span 4;  grid-row: 10 / span 3;}" +
				".imagen{  width: 50px;  margin: 0 auto;  margin-bottom: 10px;}"+
	   			"</style>" +
				"</head>" +
   				"<body class='cuerpo'>" +
   				"<div class='card front'>" +
				"<div class='blue'></div>" +
		  		"<div class='yellow'></div>" +
		  		"<div class='pink'></div>" +
				"<div class='dots'></div>" +
				"<div class='personal-intro'>" +
  				"<img src='file:///C:/Users/PC/Desktop/Logo-01.png' class='imagen'>" +
				"<p>FELIZ CUMEPLAÑOS</p>" +
				"<p>Cliente: " + Usuario + "</p>" +
				"</div>" +
				"</div>" +
				"<div class='card back'>" +
  				"<div class='yellow'></div>" +
  				"<div class='top dots'></div>" +
  				"<div class='personal-info'>" +
  				"<p>Le Collezioni</p>" +
				"<p>Te desea un feliz dia</p>" +
				"<p>Durante tu cumpleaños juan felipe oyos tendras un descuento del 10% valida por las compras que reslices durante el mes</p>" +
				"</br>" +
				"<p>visitanos para mayor informacion en</p>" +
				"<p>https://lecollezioni.com.co</p>" +
				"</div>" +
		  		"<div class='bottom dots'></div>" +
		  		"<div class='pink'></div>" +
				"</div>" +
   				"</body>" +
   				"</html>";

				mail.Body = htmlBody;

				AlternateView avHtml = AlternateView.CreateAlternateViewFromString(htmlBody, null, MediaTypeNames.Text.Html);

				LinkedResource pic1 = new LinkedResource(PathImg, MediaTypeNames.Image.Jpeg);
				pic1.ContentId = "Pic1";
				avHtml.LinkedResources.Add(pic1);

				mail.AlternateViews.Add(avHtml);

				SmtpServer.Port = 587;
				SmtpServer.Credentials = new System.Net.NetworkCredential("rdzalejandro316", "alejo3232332347");
				SmtpServer.EnableSsl = true;

				SmtpServer.Send(mail);
				MessageBox.Show("mail Send");

			}
			catch (Exception ex)
			{
				Console.WriteLine(ex.ToString());
				MessageBox.Show("no se pudo enviar el correo");
			}

		}