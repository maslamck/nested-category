<li><a href="{{$path}}"> {{$child_category->name }}</a>3{{$childCategory->parent['name']}}</li>
@if ($child_category->categories)
<ul>
    <?php
    // $path2 = '';
    ?>
    @foreach ($child_category->categories as $childCategory)


    <?php
    // $parts  = explode('/', $path);
    // $path = array_pop($parts);
    $path .= '/' . str_replace(' ', '-', $childCategory->parent['name']);
    // $path .= '/' . str_replace(' ', '-', $childCategory->name);

    ?>

    @include('child_category', ['child_category' => $childCategory])

    @endforeach
    <?php
    // $parts  = explode('/', $path);
    // $path = array_pop($parts);
    // $path .= '/' . str_replace(' ', '-', $childCategory->parent['name']);
    // $path .= '/' . str_replace(' ', '-', $childCategory->name);

    ?>
</ul>
@endif