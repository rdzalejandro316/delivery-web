public void prueba(string texto, string empresaTransportadora, string destinatario, string jefeOperacion){

            DateTime thisDay = DateTime.Today;
            string fecha = thisDay.ToString("d");     

           string PathImg =  AppDomain.CurrentDomain.BaseDirectory + "Imagenes\\4210.png";
     
           // PathImg=Regex.Replace(PathImg, "[^0-9A-Za-z-:.]", "/", RegexOptions.None);
            //PathImg = "file:///"+PathImg;

            try
            {
                MailMessage mail = new MailMessage();
                SmtpClient SmtpServer = new SmtpClient("smtp.gmail.com");
              
                mail.From = new MailAddress("rdzalejandro316@gmail.com");
                mail.To.Add("alejandro-rdz-@hotmail.com");
                mail.Subject = "Test Mail - 1";


                mail.IsBodyHtml = true;
               string htmlBody;
    
                htmlBody = "<!DOCTYPE html>"+
                "<html>"+
                "<head>"+
                "<title>recibo html</title>"+
                "<style type='text/css'>"+
                "html, body, div, span, applet, object, iframe,h1, h2, h3, h4, h5, h6, p, blockquote, pre,a, abbr, acronym, address, big, cite, code,del, dfn, em, img, ins, kbd, q, s, samp,small, strike, strong, sub, sup, tt, var,b, u, i, center,dl, dt, dd, ol, ul, li,fieldset, form, label, legend,table, caption, tbody, tfoot, thead, tr, th, td,article, aside, canvas, details, embed,figure, figcaption, footer, header, hgroup,menu, nav, output, ruby, section, summary,time, mark, audio, video {margin: 0;padding: 0;border: 0;font-size: 100%;vertical-align: baseline;}"+
                "article, aside, details, figcaption, figure,footer, header, hgroup, menu, nav, section {display: block;}"+
                "body {line-height: 1;}"+
                "ol, ul {list-style: none;}"+
                "blockquote, q {    quotes: none;}"+
                "blockquote:before, blockquote:after,q:before, q:after {content: '';content: none;}"+
                "table {border-collapse: collapse;border-spacing: 0;}"+
                "a{text-decoration:none;}"+
                ".recibo3{border: 1px solid;width: 400px;height: 400px;    margin-left: 10px;margin-top: 10px;background-color: #1F1F1F;}"+
                ".m1{width:80%;height:80%;margin-left:10%;margin-top:10%;border: 1px solid #1565C0;text-align: center;background: #9e9e9e29;}"+
                ".imag-m1{margin-top: 20px; width: 40px;height: 40px;margin-bottom: 10px;}"+
                ".m1-text{color: #bdc3c7;margin-top: 10px;}"+
                ".parrafo{padding: 5px;}"+
                ".parrafo .titulos1{color: #bdc3c7;}"+
                ".parrafo .titulos .res{color: #bdc3c7;}"+
                //".image {background-image:url("+PathImg+");}"+
                "</style>"+
                "</head>"+
                "<body>"+
                "<div class='recibo3'>"+
                "<div class='m1'>"+
                "<img src=\"cid:Pic1\" class='imag-m1 image'></img>"+
                "<p class='parrafo'><span class='titulos1'>Nombre Empresa: delivery siasoft app</span></p>"+
                "<p class='parrafo'><span class='titulos1'>Fecha: "+fecha+"</span></p>"+ 
                "<p class='parrafo'><span class='titulos1'>asunto: "+texto+"</span></p>"+ 
                "<p class='parrafo'><span class='titulos1'>empresa: "+empresaTransportadora+"</span></p>"+ 
                "<p class='parrafo'><span class='titulos1'>destino: "+destinatario+"</span></p>"+
                "<p class='parrafo'><span class='titulos1'>jefe de operacion: "+jefeOperacion+"</span></p>"+
                "</div>"+
                "</div>"+
                "</body>"+
                "</body>";

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
                MessageBox.Show("no se envio");
            }
    
     }