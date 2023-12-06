<style>
    input[type="range"] {
        -webkit-appearance: none;
        width: 100%;
        background: transparent;
        position: absolute;
        left: 0;
    }

    input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        height: 15px;
        width: 15px;
        border-radius: 50%;
        background: rgb(185 28 28);
        cursor: pointer;
        margin-top: -5px;
        position: relative;
        z-index: 10
    }

    input[type="range"]::-webkit-slider-runnable-track {
        width: 100%;
        height: 5px;
        background: #e8e8e8;
        border-radius: 3px;
        border: none;
    }
</style>

<div x-data="{filter: false}">
    <div class="flex cursor-pointer items-center justify-between px-5 py-4 bg-zinc-600 bg-opacity-40"
         x-data="{rotated: false}"
         @click="filter = !filter; rotated = !rotated">
        <span class="capitalize select-none">{{$title}}</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="8" viewBox="0 0 12 8" fill="none"
             x-bind:style="{transform: rotated ? 'rotate(180deg)' : ''}">
            <path d="M1.4 7.4L0 6L6 0L12 6L10.6 7.4L6 2.8L1.4 7.4Z" fill="black"/>
        </svg>
    </div>
    {{$slot}}
</div>
