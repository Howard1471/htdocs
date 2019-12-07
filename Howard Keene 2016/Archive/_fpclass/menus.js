/*
menus.js

Author: Philip Le Riche
*/
function preload()
{
  meet_gif=new Image(); meet_gif.src="gifs/meet.gif";
  Meet_gif=new Image(); Meet_gif.src="gifs/meet!.gif";
  learn_gif=new Image(); learn_gif.src="gifs/learn.gif";
  Learn_gif=new Image(); Learn_gif.src="gifs/learn!.gif";
  info_gif=new Image(); info_gif.src="gifs/info.gif";
  Info_gif=new Image(); Info_gif.src="gifs/info!.gif";
  news_gif=new Image(); news_gif.src="gifs/news.gif";
  News_gif=new Image(); News_gif.src="gifs/news!.gif";
  contact_gif=new Image(); contact_gif.src="gifs/contact.gif";
  Contact_gif=new Image(); Contact_gif.src="gifs/contact!.gif";

  square_gif=new Image(); square_gif.src="gifs/square.gif";
  Square_gif=new Image(); Square_gif.src="gifs/square!.gif";
  circle_gif=new Image(); circle_gif.src="gifs/circle.gif";
  Circle_gif=new Image(); Circle_gif.src="gifs/circle!.gif";
  triangle_gif=new Image(); triangle_gif.src="gifs/triangle.gif";
  Triangle_gif=new Image(); Triangle_gif.src="gifs/triangle!.gif";
  star_gif=new Image(); star_gif.src="gifs/star.gif";
  Star_gif=new Image(); Star_gif.src="gifs/star!.gif";
  rect_gif=new Image(); rect_gif.src="gifs/rect.gif";
  Rect_gif=new Image(); Rect_gif.src="gifs/rect!.gif";

  about_gif=new Image(); about_gif.src="gifs/about.gif";
  work_gif=new Image(); work_gif.src="gifs/work.gif";
  staff_gif=new Image(); staff_gif.src="gifs/staff.gif";
  parents_gif=new Image(); parents_gif.src="gifs/parents.gif";
  testml_gif=new Image(); testml_gif.src="gifs/testml.gif";
  lrn_pse_gif=new Image(); lrn_pse_gif.src="gifs/lrn_pse.gif";
  lrn_ll_gif=new Image(); lrn_ll_gif.src="gifs/lrn_ll.gif";
  lrn_env_gif=new Image(); lrn_env_gif.src="gifs/lrn_env.gif";
  lrn_phy_gif=new Image(); lrn_phy_gif.src="gifs/lrn_phy.gif";
  lrn_cre_gif=new Image(); lrn_cre_gif.src="gifs/lrn_cre.gif";
  lrn_mth_gif=new Image(); lrn_mth_gif.src="gifs/lrn_mth.gif";
  lrn_hol_gif=new Image(); lrn_hol_gif.src="gifs/lrn_hol.gif";
  times_gif=new Image(); times_gif.src="gifs/times.gif";
  fees_gif=new Image(); fees_gif.src="gifs/fees.gif";
  findus_gif=new Image(); findus_gif.src="gifs/findus.gif";
  faq_gif=new Image(); faq_gif.src="gifs/faq.gif";
  nws_gif=new Image(); nws_gif.src="gifs/nws.gif";
  cont_gif=new Image(); cont_gif.src="gifs/cont.gif";
  prosp_gif=new Image(); prosp_gif.src="gifs/prosp.gif";
  feedback_gif=new Image(); feedback_gif.src="gifs/feedback.gif";
  row3blank_gif=new Image(); row3blank_gif.src="gifs/row3blank.gif";

  col2link=999;
  col3link=999;
  col4link=999;
  col5link=999;
  col6link=999;
  col7link=999;
  col8link=999;
  for (i=0;i<document.links.length;i++)
  {
    if (document.links[i].href.indexOf("void(2)")!=-1)
    { col2link=i; }
    if (document.links[i].href.indexOf("void(3)")!=-1)
    { col3link=i; }
    if (document.links[i].href.indexOf("void(4)")!=-1)
    { col4link=i; }
    if (document.links[i].href.indexOf("void(5)")!=-1)
    { col5link=i; }
    if (document.links[i].href.indexOf("void(6)")!=-1)
    { col6link=i; }
    if (document.links[i].href.indexOf("void(7)")!=-1)
    { col7link=i; }
    if (document.links[i].href.indexOf("void(8)")!=-1)
    { col8link=i; }
  }
}

function swapimg(obj, newsrc)
{
  if (document.images) { obj.src = newsrc; }
}

function swaplink(link, url)
{
  document.links[link].href=url;
}

function swapback()
{
  swapimg(document.meet, meet_gif.src);
  swapimg(document.learn, learn_gif.src);
  swapimg(document.info, info_gif.src);
  swapimg(document.news, news_gif.src);
  swapimg(document.contact, contact_gif.src);
  swapimg(document.square, square_gif.src);
  swapimg(document.circle, circle_gif.src);
  swapimg(document.triangle, triangle_gif.src);
  swapimg(document.star, star_gif.src);
  swapimg(document.rect, rect_gif.src);
}

function swapbackall()
{
  swapback();
  swapimg(document.row3col2, row3blank_gif.src);
  swapimg(document.row3col3, row3blank_gif.src);
  swapimg(document.row3col4, row3blank_gif.src);
  swapimg(document.row3col5, row3blank_gif.src);
  swapimg(document.row3col6, row3blank_gif.src);
  swapimg(document.row3col7, row3blank_gif.src);
  swapimg(document.row3col8, row3blank_gif.src);
  swaplink(col2link, "javascript:void(2)");
  swaplink(col3link, "javascript:void(3)");
  swaplink(col4link, "javascript:void(4)");
  swaplink(col5link, "javascript:void(5)");
  swaplink(col6link, "javascript:void(6)");
  swaplink(col7link, "javascript:void(7)");
  swaplink(col8link, "javascript:void(8)");
}

function swapmeet()
{
  swapback();
  swapimg(document.meet, Meet_gif.src);
  swapimg(document.square, Square_gif.src);
  swapimg(document.row3col2, row3blank_gif.src);
  swapimg(document.row3col3, about_gif.src);
  swapimg(document.row3col4, work_gif.src);
  swapimg(document.row3col5, staff_gif.src);
  swapimg(document.row3col6, parents_gif.src);
  swapimg(document.row3col7, testml_gif.src);
  swapimg(document.row3col8, row3blank_gif.src);
  swaplink(col2link, "javascript:void(2)");
  swaplink(col3link, "about.htm");
  swaplink(col4link, "work.htm");
  swaplink(col5link, "staff.htm");
  swaplink(col6link, "parents.htm");
  swaplink(col7link, "testml.htm");
  swaplink(col8link, "javascript:void(8)");
}

function swaplearn()
{
  swapback();
  swapimg(document.learn, Learn_gif.src);
  swapimg(document.circle, Circle_gif.src);
  swapimg(document.row3col2, lrn_pse_gif.src);
  swapimg(document.row3col3, lrn_ll_gif.src);
  swapimg(document.row3col4, lrn_env_gif.src);
  swapimg(document.row3col5, lrn_phy_gif.src);
  swapimg(document.row3col6, lrn_cre_gif.src);
  swapimg(document.row3col7, lrn_mth_gif.src);
  swapimg(document.row3col8, lrn_hol_gif.src);
  swaplink(col2link, "lrn_pse.htm");
  swaplink(col3link, "lrn_ll.htm");
  swaplink(col4link, "lrn_env.htm");
  swaplink(col5link, "lrn_phy.htm");
  swaplink(col6link, "lrn_cre.htm");
  swaplink(col7link, "lrn_mth.htm");
  swaplink(col8link, "lrn_hol.htm");
}

function swapinfo()
{
  swapback();
  swapimg(document.info, Info_gif.src);
  swapimg(document.triangle, Triangle_gif.src);
  swapimg(document.row3col2, row3blank_gif.src);
  swapimg(document.row3col3, row3blank_gif.src);
  swapimg(document.row3col4, times_gif.src);
  swapimg(document.row3col5, fees_gif.src);
  swapimg(document.row3col6, findus_gif.src);
  swapimg(document.row3col7, faq_gif.src);
  swapimg(document.row3col8, row3blank_gif.src);
  swaplink(col2link, "javascript:void(2)");
  swaplink(col3link, "javascript:void(3)");
  swaplink(col4link, "times.htm");
  swaplink(col5link, "fees.htm");
  swaplink(col6link, "findus.htm");
  swaplink(col7link, "faq.htm");
  swaplink(col8link, "javascript:void(8)");
}

function swapnews()
{
  swapback();
  swapimg(document.news, News_gif.src);
  swapimg(document.star, Star_gif.src);
  swapimg(document.row3col2, row3blank_gif.src);
  swapimg(document.row3col3, row3blank_gif.src);
  swapimg(document.row3col4, row3blank_gif.src);
  swapimg(document.row3col5, row3blank_gif.src);
  swapimg(document.row3col6, row3blank_gif.src);
  swapimg(document.row3col7, nws_gif.src);
  swapimg(document.row3col8, row3blank_gif.src);
  swaplink(col2link, "javascript:void(2)");
  swaplink(col3link, "javascript:void(3)");
  swaplink(col4link, "javascript:void(4)");
  swaplink(col5link, "javascript:void(5)");
  swaplink(col6link, "javascript:void(6)");
  swaplink(col7link, "news.htm");
  swaplink(col8link, "javascript:void(8)");
}

function swapcont()
{
  swapback();
  swapimg(document.contact, Contact_gif.src);
  swapimg(document.rect, Rect_gif.src);
  swapimg(document.row3col2, row3blank_gif.src);
  swapimg(document.row3col3, row3blank_gif.src);
  swapimg(document.row3col4, row3blank_gif.src);
  swapimg(document.row3col5, row3blank_gif.src);
  swapimg(document.row3col6, cont_gif.src);
  swapimg(document.row3col7, prosp_gif.src);
  swapimg(document.row3col8, feedback_gif.src);
  swaplink(col2link, "javascript:void(2)");
  swaplink(col3link, "javascript:void(3)");
  swaplink(col4link, "javascript:void(4)");
  swaplink(col5link, "javascript:void(5)");
  swaplink(col6link, "cont.htm");
  swaplink(col7link, "prosp.htm");
  swaplink(col8link, "feedback.htm");
}

function open_window(url,name,features)
{
  window.open(url,name,features);
}
