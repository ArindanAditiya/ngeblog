@props(['href', "categoryName"])

@php
$bgColor = "";
switch ($categoryName) {
    case "web-technologies":
        $bgColor = "bg-gray-600"; ;
        break;
    case "graphic-design":
        $bgColor = "bg-red-600"; ;
        break;
    case "data-mining":
        $bgColor = "bg-teal-600"; ;
        break;
    case "cloud-computing":
        $bgColor = "bg-yellow-600"; ;
        break;
    case "machine-learning":
        $bgColor = "bg-blue-600"; ;
        break;
    default:
        $bgColor = "bg-white" ;
        break;
}
@endphp

<a href="{{ $href }}"
    {{ $attributes->merge([
        "class" => "py-1 px-2 bg-blue-500 text-white text-sm rounded-2xl ".$bgColor
        ]) }}>
{{ $slot }}</a>