<style>
    input[type="range"] {
        -webkit-appearance: none;
        -moz-appearance: none;
        width: 100%;
        background: transparent;
        position: absolute;
        left: 0;
    }

    input[type="range"]::-ms-thumb {
        height: 15px;
        width: 15px;
        border-radius: 50%;
        background: rgb(185 28 28);
        cursor: pointer;
        margin-top: -5px;
        position: relative;
        z-index: 10
    }

    input[type="range"]::-ms-track {
        width: 100%;
        height: 5px;
        background: rgba(185, 28, 28, 0.1);
        border-radius: 3px;
        border: none;
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
        background: rgba(185, 28, 28, 0.1);
        border-radius: 3px;
        border: none;
    }

    input[type="range"]::-moz-range-thumb {
        height: 15px;
        width: 15px;
        border-radius: 50%;
        background: rgb(185 28 28);
        cursor: pointer;
        position: relative;
    }

    input[type="range"]::-moz-range-track {
        width: 100%;
        height: 5px;
        background: rgba(185, 28, 28, 0.1);
        border-radius: 3px;
        border: none;
    }

</style>

<div x-data="{filter: false}">
    <div class="flex cursor-pointer items-center justify-between bg-zinc-600 bg-opacity-40 px-5 py-4"
         x-data="{rotated: false}"
         @click="filter = !filter; rotated = !rotated">
        <span class="select-none capitalize">{{$title}}</span>
        <x-filter-arrow/>
    </div>
    {{$slot}}
</div>
