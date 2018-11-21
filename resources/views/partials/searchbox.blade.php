<div style="z-index:10000000;padding:20px;background: rgba(0, 0, 0, 0.7);" class="modal fade search-modal" tabindex="-1" role="dialog" aria-labelledby="search-modal" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="margin-top: 100px">
    <div class="modal-content" style="background: transparent;padding:10px 20px;">
      <form class="search-form-simple" action="" method="GET">
        <label class="search-icon">
        <input style="display:none" type="submit" value="">
        <span  style="color:grey" class="glyphicon glyphicon-search" aria-hidden="true"></span>
        </label>
        <input type="text" placeholder="Search..." autofocus name="keyword" style="height: 40px;font-size:25px;" class="form-control" value="">
      </form>
      <div style="text-align:right;"><a href="{{route('search')}}" style="color:#fbba42;font-weight:bold">Advanced search</a></div>
    </div>
  </div>
</div>
