<li class="sub-menu">
    <a class="active" href="{{ URL::route('user.dashboard') }}">
        <i class="icon-dashboard"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="sub-menu">
    <a href={{URL::to('article/index')}}>
        <i class="icon-filter"></i>
        <span>Article/Page</span>
    </a>
</li>


<li class="sub-menu">
    <a href="javascript:;">
        <i class="icon-bookmark"></i>
        <span>Product</span>
    </a>
    <ul class="sub">
        <li><a  href={{URL::to('product_group/index')}}>Product group</a></li>
        <li><a  href={{URL::to('product_subgroup/index')}}>Product sub group</a></li>
        <li><a  href={{URL::to('product/index')}}>Product</a></li>
        <!-- <li><a  href={{URL::to('gal_image/index')}}>Gallery Image</a></li> -->
    </ul>
</li>

<li class="sub-menu">
    <a href="javascript:;">
        <i class="icon-bookmark"></i>
        <span>Order Details</span>
    </a>
    <ul class="sub">
        <li><a  href={{URL::to('order_paid/index')}}>Current Order</a></li>
        <li><a  href={{URL::to('order_paid/approved')}}>Approved order</a></li>
        <li><a  href={{URL::to('order_paid/delivered')}}>Delivered order</a></li>

        <li><a  href={{URL::to('order_paid/photo-frame')}}>Photo Frame order</a></li>
        <li><a  href={{URL::to('order_paid/canvas-print')}}>Canvas Print order</a></li>
        <li><a  href={{URL::to('order_paid/plain-mirror')}}>Plain Mirror order</a></li>
    </ul>
</li>

<li class="sub-menu">
    <a href="{{URL::to('order_paid/generate_excel')}}">
        <i class="icon-bookmark"></i>
        <span>Generate Excel</span>
    </a>
  
</li>

<li class="sub-menu">
    <a href="{{URL::to('cat_slider/index')}}">
        <i class="icon-book"></i>
        <span>Slider</span>
    </a>
    <ul class="sub">
        <li><a  href={{URL::to('cat_slider/index')}}>Cat Slider</a></li>
        <li><a  href={{URL::to('slider_image/index')}}>Slider Image</a></li>
    </ul>
</li>

<!-- <li class="sub-menu">
    <a href="{{URL::to('menu/index')}}">
        <i class="icon-sitemap"></i>
        <span>Menu</span>
    </a>
    <ul class="sub">
        <li><a  href={{URL::to('menu_type/index')}}>Menu Type</a></li>
        <li><a  href={{URL::to('menu/index')}}>Menu</a></li>
    </ul>
</li> -->

{{--<li class="sub-menu">--}}
    {{--<a href={{URL::to('team/index')}}>--}}
        {{--<i class="icon-female"></i>--}}
        {{--<span>Team</span>--}}
    {{--</a>--}}
{{--</li>--}}
{{--<li class="sub-menu">--}}
    {{--<a href={{URL::to('skills/index')}}>--}}
        {{--<i class="icon-file"></i>--}}
        {{--<span>Skills</span>--}}
    {{--</a>--}}
{{--</li>--}}
{{--<li class="sub-menu">--}}
    {{--<a href={{URL::to('testimonial/index')}}>--}}
        {{--<i class="icon-camera"></i>--}}
        {{--<span>Testimonial</span>--}}
    {{--</a>--}}
{{--</li>--}}

{{--<li class="sub-menu">--}}
    {{--<a href={{URL::to('social_icon/index')}}>--}}
        {{--<i class="icon-anchor"></i>--}}
        {{--<span>Social Icon</span>--}}
    {{--</a>--}}
{{--</li>--}}


<li class="sub-menu">
    <a href="{{URL::to('blog_cat/index')}}">
        <i class="icon-inbox"></i>
        <span>Blog</span>
    </a>
    <ul class="sub">
        <li><a  href={{URL::to('blog_cat/index')}}>Blog Cat</a></li>
        <li><a  href={{URL::to('blog_item/index')}}>Blog Item</a></li>
    </ul>
</li>

<li class="sub-menu">
    <a href="#">
        <i class="icon-inbox"></i>
        <span>Photo Frame</span>
    </a>
    <ul class="sub">
        <li><a  href={{URL::to('admin_photo_frame/index')}}>Image Size</a></li>
        
        <li><a  href={{URL::to('admin_frame_category/index')}}>Frame Category</a></li>

        <li><a  href={{URL::to('admin_frame/index')}}>Frame</a></li>

        <li><a  href={{URL::to('admin_mat/index')}}>Mat</a></li>

        <li><a  href={{URL::to('admin_glass_backing/index')}}>Glass & Backing</a></li>

        <li><a  href={{URL::to('admin_printing/index')}}>Printing</a></li>

        <li><a  href={{URL::to('admin_canvas_edge/index')}}>Canvas Edge</a></li>

        <li><a  href={{URL::to('admin_plain_frame/index')}}>Plain Mirror Frame</a></li>

         <li><a  href="{{URL::to('discounts')}}">Settings</a></li>
    </ul>
</li>

{{--<li class="sub-menu">--}}
    {{--<a href={{URL::to('media/index')}}>--}}
        {{--<i class="icon-camera"></i>--}}
        {{--<span>Media Manager</span>--}}
    {{--</a>--}}
{{--</li>--}}

{{--<li class="sub-menu">--}}
    {{--<a href={{URL::to('widget/index')}}>--}}
        {{--<i class="icon-book"></i>--}}
        {{--<span>Widget</span>--}}
    {{--</a>--}}
{{--</li>--}}

<!-- <li class="sub-menu">
    <a href="{{URL::to('user/profile-info')}}">
        <i class="icon-info"></i>
        <span>Profile</span>
    </a>
    <ul class="sub">
        <li><a  href={{URL::to('user/profile-info')}}>My Profile</a></li>
        <li><a  href={{URL::to('user/profile-picture-view')}}>Profile Picture</a></li>
        <li><a  href={{URL::to('user/change-user-password-view')}}>Password Change</a></li>
    </ul>
</li> -->


@if(Session::has('user_type'))
    @if(Session::get('user_type')=='admin')
        <!-- <li class="sub-menu">
            <a href={{URL::to('user/user-list')}}>
                <i class="icon-user-md"></i>
                <span>User List</span>
            </a>
        </li> -->

        <li class="sub-menu">
            <a href={{URL::to('reviews/all-list')}}>
                <i class="icon-user-md"></i>
                <span>Reviews List</span>
            </a>
        </li>
        {{--<li class="sub-menu">--}}
            {{--<a href={{URL::to('user/request')}}>--}}
                {{--<i class="icon-trello"></i>--}}
                {{--<span>Invitation</span>--}}
            {{--</a>--}}
        {{--</li>--}}
    @endif
@endif


<!-- <li class="sub-menu">
    <a href="javascript:;" >
        <i class="icon-book"></i>
        <span>Settings</span>
    </a>
    <ul class="sub">
        <li><a  href="{{URL::to('central-settings')}}">Central Settings</a></li>
        {{--<li><a  href="buttons.html">Buttons</a></li>--}}
        {{--<li><a  href="widget.html">Widget</a></li>--}}
        {{--<li><a  href="slider.html">Slider</a></li>--}}
        {{--<li><a  href="nestable.html">Nestable</a></li>--}}
    </ul>
</li>

 -->
<li class="sub-menu">
    &nbsp;
</li>
<li class="sub-menu">
    &nbsp;
</li>
<li class="sub-menu">
    &nbsp;
</li>


