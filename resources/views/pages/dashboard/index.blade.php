<x-dashboard.layout title="{{ $title }}">
<div class="grid grid-cols-2">
    <div style="width: 500px;" class="bg-primary m-4 p-4 rounded-md shadow-lg col-span-2 h-fit"><canvas id="borrower"></canvas></div>
    <div style="width: 500px;" class="bg-primary m-4 p-4 rounded-md shadow-lg col-span-2 justify-self-end h-fit"><canvas id="not-return"></canvas></div>
    <div style="width: 500px;" class="bg-primary m-4 p-4 rounded-md shadow-lg col-span-2 h-fit"><canvas id="favorite-books"></canvas></div>
    </div>
</x-dashboard.layout>
