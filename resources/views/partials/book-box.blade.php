<div class="col col-md-2 col-sm-6 col-xs-12 col-sm-6 col-xs-12">
  <a href="{{route('book')}}">
    <div class="box">
      <p class="price">$10</p>
      <div class="img-wrapper"><img src="images/geisha.jpg" alt=""></div>
      <p class="book-title"><b>Memoirs of a Geisha</b></p>
      <a href="{{route('author')}}" class="book-author">Author</a>
      <hr class="short-line">
      <a href="{{route('search',['genre'=>'abc'])}}" class="book-genre">genre</a>
      <hr class="long-line">
      <span style="color:grey" class="glyphicon glyphicon-star" aria-hidden="true"></span>
      <span><b>4.5</b></span>
    </div>
  </a>
</div>
