@extends("components.base")
@section("content")
    <div class="page">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <input type="hidden" name="action" value="{{ route('edit.update', [$tab->id]) }}">
        <input class="hidden-tuning" type="hidden" value="{{ $tab->tuning->tuning }}">
        <div class="guitar">
            <div class="guitar-head">
                <div class="top-decor"></div>
                <div class="bottom-decor"></div>
            </div>
            <table class="guitar-neck">
                <thead>
                    <tr>
                        <th>0</th><th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th><th>7</th><th>8</th><th>9</th><th>10</th><th>11</th><th>12</th><th>13</th><th>14</th><th>15</th><th>16</th><th>17</th><th>18</th><th>19</th><th>20</th><th>21</th><th>22</th><th>23</th><th>24</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="empty-string"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                    <tr>
                        <td class="empty-string"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                    <tr>
                        <td class="empty-string"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                    <tr>
                        <td class="empty-string"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                    <tr>
                        <td class="empty-string"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                    <tr>
                        <td class="empty-string"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                </tbody>
            </table>
            <div class="guitar-body">
                <div class="circle-left"></div>
                <div class="circle-right"></div>
            </div>
        </div>
        <form class="input-wrapper" action="{{ route('edit.update', [$tab->id]) }}" method="POST">
            @csrf
            <input class="input-title" type="text" name="title" value="{{ $tab->title }}">
            <input class="input-performer" type="text" name="performer" value="{{ $tab->performer }}">
            <input type="hidden" name="tempo">
            <input type="hidden" name="tab">
            <div class="tuning-wrapper">
                <p class="text">Tuning:</p>
                <select id="tuning" class="tuning" name="tuning_id">
                    @foreach($tunings as $tuning)
                    <option value="{{ $tuning->id }}" {{ $tab->tuning_id == $tuning->id ? 'selected' : '' }}>{{ $tuning->name }}</option>
                    @endforeach()
                </select>
            </div>
            <div class="publicity-wrapper">
                <p class="text">Private</p>
                <div class="switch">
                    <input type="checkbox" name="publicity" id="publicity" {{ !$tab->publicity ? 'checked' : '' }}>
                    <div class="circle {{ !$tab->publicity ? 'private' : 'public' }}"></div>
                </div>
                <p class="text">Public</p>
            </div>
        </form>
        <div class="chord-wrapper">
            <p class="text">Add chord:</p>
            <select class="tuning chord" name="chord_id">
                <option value=""></option>
                @foreach($chords as $chord)
                <option class="chord-option" value="{{ $chord->chord }}">{{ $chord->name }}</option>
                @endforeach()
            </select>
        </div>
        <div class="button-wrapper">
            <button id="play">Play</button>
            <button id="stop" disabled>Stop</button>
        </div>
        <div class="button-wrapper">
            <button id="save">Save</button>
            <button id="add-row">Add Row</button>
            <form action="{{ route('delete', [$tab->id]) }}" method="POST">
                @csrf
                <button id="deletetab" class="red-btn">Delete Tab</button>
            </form>
        </div>
        <div class="tab">
            <div class="tempo-wrapper">
                <p class="text">Tempo:</p>
                <input class="bpm" type="number" value="{{ $tab->tempo }}">
                <p class="text">bpm</p>
            </div>
            <input class="hidden-tab" style="display: none;" value="{{ $tab->tab }}">
        </div>
    </div>
    @vite(['resources/js/tabgenerator.js', 'resources/js/tabplayer.js', 'resources/js/buttons.js'])
@endsection