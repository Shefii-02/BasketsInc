@extends('layouts.frontend')
@section('styles')
<style>

.blog-title{
    background:rgba(var(--bs-dark-rgb), 0.25);
}

.list-style-none{
    list-style: none
}

</style>
@endsection
@section('contents')
@section('title', $single_blog->name)    

  <section class="bread_crumb bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <p class="mb-0 f-15">{{capitalText($single_blog->name)}}</p>
                </div>
                <div class="col-6 text-end">
                    <p class="mb-0 f-14 text-dark ">You are here: <a href="{{url('/')}}" class="text-dark">Basketsinc</a> >
                    <a href="{{url('category')}}">Blogs</a> > {{$single_blog->name}}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-single-view page_section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-9">
                    <div class="row">
                        <div class="col-12  ">
                            
                            <div class="blog-card">
                                <div class="blog-img position-relative">
                                    <img class="w-100" src="{{isset($single_blog) && $single_blog->picture != '' ? asset('images/blogs/'.$single_blog->picture):asset('dummy.jpg')}}" alt="">
                                    
                                </div>
                                <div class="blog-head d-flex justify-content-between mt-2 align-items-center">
                                    
                                <div class="fs-2 fw-semibold">{{ $single_blog->name }}</div> 
                                    <div class=""><h5 class="mb-0">{{date('D M Y',strtotime($single_blog->published_at))}}</h5></div>
                                    
                                            <!-- ShareThis BEGIN -->
                                            <div class="sharethis-inline-share-buttons float-left z-index"></div>
                                            <!-- ShareThis END -->
                                </div>
                          
                                <div class="blog-content px-0">

                                    <div>{!! str_replace('&nbsp;','', $single_blog->description) !!}</div>

                                </div>
                            </div>
                        </div>

                    </div>



                </div>

                <div class="col-12 col-md-12 col-lg-3">
                    <div class="for-sticky">
                        <div class="re-category">
                            <div class="row">
                                <div class="col-12">
                                    <div class="related-blog bg-light p-3 rounded">
                                        <h4 class="mb-3">Related Blog</h4>
                                        <ul class="list-style-none">
                                         @foreach($blogs as $items)
                                        <li>
                                            <a href="{{url('blog/'.$items->slug)}}"  class="text-decoration-none text-dark">
                                                <div class="row mb-2 align-items-center">
                                                    <div class="col-6">
                                                        <img class="w-100 rounded" src="{{isset($blogs) && $items->picture != '' ? asset('images/blogs/'.$items->picture):asset('dummy.jpg')}}" alt="">
                                                    </div>
                                                    <div class="col-6">
                                                        <div>
                                                            <p class="fw-bold text-overflow mb-0">{{$items->name}}</p>
                                                            <p>{{date('d M Y',strtotime($items->published_at))}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                            </a>
                                        </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="recent mt-3">
                            <div class="row ">
                                <div class="col-12">
                                    <div class="related-blog bg-light p-3 rounded">
                                        <h4 class="mb-3">Category</h4>
                                        <ul class="list-style-none">
                                          @foreach($blog_category as $_category)
                                        <li>
                                            <a href="{{url('blog/category/'.$_category->slug)}}"  class="text-decoration-none text-dark">
                                                
                                                <div class="row mb-2 align-items-center">
                                                    <div class="col-6">
                                                        <img class="w-100 rounded" src="{{isset($blog_category) && $_category->picture != '' ? asset('images/blogs/'.$_category->picture):asset('dummy.jpg')}}" alt="">
                                                    </div>
                                                    <div class="col-6">
                                                        <div>
                                                            <h5 class="fw-bold">{{$_category->name}}</h5>
                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                </div>


            </div>
        </div>
    </section>




@endsection
@section('scripts')
<script>
    $(function() {
        $('.blog-content p').each(function() {
            if ($(this).html() == '&nbsp;') {
                $(this).remove();
            }
        });
</script>
@endsection