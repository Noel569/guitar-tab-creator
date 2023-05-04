@extends("components.base")
@section("content")
    <div class="page">
        <div class="guitar">
            <div class="guitar-head">
                <div class="top-decor"></div>
                <div class="bottom-decor"></div>
            </div>
            <table class="guitar-neck">
                <thead>
                    <tr>
                        <th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th><th>7</th><th>8</th><th>9</th><th>10</th><th>11</th><th>12</th><th>13</th><th>14</th><th>15</th><th>16</th><th>17</th><th>18</th><th>19</th><th>20</th><th>21</th><th>22</th><th>23</th><th>24</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                </tbody>
            </table>
            <div class="guitar-body">
                <div class="circle-left"></div>
                <div class="circle-right"></div>
            </div>
        </div>
        <form class="input-wrapper" action="{{ route('editor.store') }}" method="POST">
            @csrf
            <input class="input-title" type="text" name="title" placeholder="Enter Title">
            <input class="input-performer" type="text" name="performer" placeholder="Enter Performer">
            <input type="hidden" name="tempo">
            <input type="hidden" name="tab">
            <div class="tuning-wrapper">
                <p class="tuning-text">Tuning:</p>
                <select class="tuning" name="tuning_id">
                    @foreach($tunings as $tuning)
                    <option value="{{ $tuning->id }}">{{ $tuning->name }}</option>
                    @endforeach()
                </select>
            </div>
            <div class="publicity-wrapper">
                <p class="publicity-text">Private</p>
                <div class="publicity">
                    <div class="circle private"></div>
                </div>
                <p class="publicity-text">Public</p>
            </div>
        </form>
        <div class="button-wrapper">
            <button id="play">Play</button>
            <button id="stop" disabled>Stop</button>
        </div>
        <div class="button-wrapper">
            <button id="save">Save</button>
        </div>
        <div class="tab">
            <input class="bpm" type="number" value="120">
        </div>
    </div>
    @vite(['resources/js/tabgenerator.js', 'resources/js/tabplayer.js', 'resources/js/buttons.js'])
@endsection