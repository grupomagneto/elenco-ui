<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>gallery tabs</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
			* {
			  box-sizing: border-box;
			  font-family: Roboto, sans-serif;
			}

			body {
			  margin: 0;
			  -webkit-text-size-adjust: 100%;
			}

			/* ----- BUTTONS ----- */
			.product-view {
			  margin-bottom: 10px;
			  padding: 5px;
			  text-align: left;
			}
			.product-view i {
			  display: inline-block;
			  font-size: 1.5em;
			  padding: 10px;
			  background: #ddd;
			  cursor: pointer;
			  -webkit-user-select: none;
			     -moz-user-select: none;
			      -ms-user-select: none;
			          user-select: none;
			}
			.product-view i.active {
			  background: #bbb;
			}

			/* ----- GALLERY VIEW ----- */
			.products.gallery {
			  -webkit-column-width: 300px;
			     -moz-column-width: 300px;
			          column-width: 300px;
			  -webkit-column-gap: 5px;
			     -moz-column-gap: 5px;
			          column-gap: 5px;
			  padding: 0 5px;
			  font-size: 0;
			}
			.products.gallery figure {
			  position: relative;
			  display: inline-block;
			  width: 100%;
			  height: auto;
			  margin: 0 0 5px 0;
			}
			.products.gallery figure::after {
			  content: '';
			  position: absolute;
			  top: 0;
			  left: 0;
			  width: 100%;
			  height: 100%;
			  -webkit-transition: background 300ms;
			  transition: background 300ms;
			}
			.products.gallery figure img {
			  width: 100%;
			  height: auto;
			}
			.products.gallery figure figcaption {
			  position: absolute;
			  top: 50%;
			  left: 0;
			  -webkit-transform: translateY(-50%);
			          transform: translateY(-50%);
			  z-index: 2;
			  width: 100%;
			  max-height: 100%;
			  padding: 20px;
			  font-size: 16px;
			  font-weight: 500;
			  color: #ddd;
			  text-shadow: 0 0 1px #000;
			  opacity: 0;
			  overflow: auto;
			  -webkit-transition: opacity 300ms;
			  transition: opacity 300ms;
			  -webkit-overflow-scrolling: touch;
			}
			.products.gallery figure figcaption::-webkit-scrollbar {
			  width: 4px;
			}
			.products.gallery figure figcaption::-webkit-scrollbar-track {
			  background: transparent;
			}
			.products.gallery figure figcaption::-webkit-scrollbar-thumb {
			  background: #bbb;
			}
			.products.gallery figure figcaption::-webkit-scrollbar-thumb:hover {
			  background: #999;
			}
			.products.gallery figure:hover::after {
			  background: rgba(0, 0, 0, 0.8);
			}
			.products.gallery figure:hover figcaption {
			  opacity: 1;
			}

			/* ----- LIST VIEW ----- */
			.products.list {
			  padding: 0 5%;
			}
			.products.list figure {
			  width: 100%;
			  height: auto;
			  max-width: 600px;
			  margin: 0 auto 40px;
			  background: #eee;
			  border: 1px solid #ddd;
			}
			.products.list figure img {
			  width: 100%;
			  height: auto;
			}
			.products.list figure figcaption {
			  padding: 20px;
			  line-height: 1.4;
			}

	</style>
</head>
<body>

<nav class="product-view">
  <i class="fa fa-th btn-gallery active"></i>
  <i class="fa fa-list btn-list"></i>
</nav>

<section class="products gallery">
  <figure>
    <img src="https://source.unsplash.com/ccTnfRFjtfI/700x300" />
    <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus omnis facere earum eveniet dolore numquam velit ipsum repellat! Accusamus doloribus quidem quisquam, laboriosam ea porro earum dolor, illum? Quas, voluptatibus.</figcaption>
  </figure>
  <figure>
    <img src="https://source.unsplash.com/z8ct_Q3oCqM/600x300" />
    <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi nobis inventore est voluptatem sit laborum modi repellendus, corporis cum eligendi deleniti minima aspernatur alias, incidunt dignissimos cumque voluptate, totam earum.</figcaption>
  </figure>
  <figure>
    <img src="https://source.unsplash.com/EjJpPNdc8NY/700x500" />
    <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt aperiam nostrum et beatae laudantium. Quam magnam, nemo voluptates molestiae maiores reprehenderit veritatis laborum, nobis ut veniam eos. Harum architecto, illum.</figcaption>
  </figure>
  <figure>
    <img src="https://source.unsplash.com/qV2p17GHKbs/800x300" />
    <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure quasi voluptatibus adipisci, assumenda, ipsa laborum eligendi nemo mollitia dolorum, earum nam odit rerum minus, autem consequatur totam corrupti quas asperiores!</figcaption>
  </figure>
  <figure>
    <img src="https://source.unsplash.com/METhgKHfWkk/600x300" />
    <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur ipsum beatae consequuntur tenetur, sit itaque quis, maxime quo atque aut inventore, cum ipsa libero vitae velit molestiae, iure iste provident.</figcaption>
  </figure>
  <figure>
    <img src="https://source.unsplash.com/VeKqfHaa3e4/800x600" />
    <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat commodi at fuga ad odit illo exercitationem sapiente consectetur itaque placeat, ullam cupiditate consequuntur atque inventore quia qui reprehenderit necessitatibus asperiores?</figcaption>
  </figure>
  <figure>
    <img src="https://source.unsplash.com/LPffuc1TESQ/700x400" />
    <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto tempore rerum facere, libero veritatis doloremque quo, obcaecati, magni delectus ullam nihil. Vitae maxime laborum odio officiis aspernatur ab architecto, amet.</figcaption>
  </figure>
  <figure>
    <img src="https://source.unsplash.com/uOi3lg8fGl4/600x800" />
    <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod quidem molestiae optio, ipsam quae. Fugiat laborum, velit soluta quidem perferendis quasi consequatur atque. Quidem soluta et nemo sequi molestias esse.</figcaption>
  </figure>
  <figure>
    <img src="https://source.unsplash.com/Aw-uW2Hycuk/700x400" />
    <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere magnam, autem vero corporis eligendi at sint deserunt ex officia, dolor, inventore dolore aperiam voluptatibus maiores mollitia consectetur pariatur numquam eius.</figcaption>
  </figure>
  <figure>
    <img src="https://source.unsplash.com/G1HbURh6Afo/800x300" />
    <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt harum maiores exercitationem qui laudantium enim ad, ullam cumque commodi explicabo natus ipsa at temporibus aperiam nobis accusantium fuga tempora. Expedita.</figcaption>
  </figure>
  <figure>
    <img src="https://source.unsplash.com/_kkx1WekVRY/800x500" />
    <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, quas sed illum culpa, tempora, deleniti consequatur eligendi cumque delectus voluptas iusto libero dolor laudantium sapiente vitae iste quo omnis facilis.</figcaption>
  </figure>
  <figure>
    <img src="https://source.unsplash.com/_e-8w6ZM9ZI/700x500" />
    <figcaption>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad ex natus necessitatibus architecto maxime ratione dolorum, aliquid explicabo quibusdam enim ut eveniet sequi exercitationem error, et quidem repellat, ipsa quo.</figcaption>
  </figure>
</section>



<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</body>
</html>
