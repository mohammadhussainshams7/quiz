@if (Session::has('choicesUser'))

    <div class="container">
        @for ($i = 0; $i < $countArray; $i++)
            <section class="question mt-5">

                <div class="card">
                    <div class="card-body  text-center">

                        @if ($i > 0)
                            <h5 class="card-title">{{ $have_session_choicesUser[0 + $itemArr] }}</h5>
                        @else
                            <h5 class="card-title">{{ $have_session_choicesUser[0] }}</h5>
                        @endif
                    </div>
                </div>

            </section>
            <section class="ansser">
                <div class="card">





                    @if ($i > 2)
                        <div
                            class="form-check @if ($have_session_choicesUser[2 + $itemArr] == $have_session_choicesUser[1 + $itemArr]) right @endif @if ($have_session_choicesUser[6 + $itemArr] == $have_session_choicesUser[2 + $itemArr]) @if ($have_session_choicesUser[6 + $itemArr] == $have_session_choicesUser[1 + $itemArr])
                        right @else wrong @endif
                @endif">

                            <label class="form-check-label ">
                                {{ $have_session_choicesUser[2 + $itemArr] }}
                            </label>
                        </div>
                    @else
                        <div
                            class="form-check @if ($have_session_choicesUser[2] == $have_session_choicesUser[1]) right @endif @if ($have_session_choicesUser[6] == $have_session_choicesUser[2]) @if ($have_session_choicesUser[6] == $have_session_choicesUser[1])
                    right @else wrong @endif
                    @endif">
                            <label class="form-check-label">
                                {{ $have_session_choicesUser[2] }}
                            </label>
                        </div>
                    @endif







                    @if ($i > 3)
                        <div
                            class="form-check  @if ($have_session_choicesUser[3 + $itemArr] == $have_session_choicesUser[1 + $itemArr]) right @endif @if ($have_session_choicesUser[6 + $itemArr] == $have_session_choicesUser[3 + $itemArr]) @if ($have_session_choicesUser[3 + $itemArr] == $have_session_choicesUser[1 + $itemArr])
                                right @else wrong @endif
                                @endif">
                            <label class="form-check-label">
                                {{ $have_session_choicesUser[3 + $itemArr] }}
                            </label>
                        </div>
                    @else
                        <div
                            class="form-check @if ($have_session_choicesUser[3] == $have_session_choicesUser[1]) right @endif @if ($have_session_choicesUser[6] == $have_session_choicesUser[3]) @if ($have_session_choicesUser[6] == $have_session_choicesUser[1])
                    right @else wrong @endif
                    @endif">

                            <label class="form-check-label">
                                {{ $have_session_choicesUser[3] }}
                            </label>
                        </div>
                    @endif






                    @if ($i > 4)
                        <div
                            class="form-check @if ($have_session_choicesUser[4 + $itemArr] == $have_session_choicesUser[1 + $itemArr]) right @endif @if ($have_session_choicesUser[6 + $itemArr] == $have_session_choicesUser[4 + $itemArr]) @if ($have_session_choicesUser[4 + $itemArr] == $have_session_choicesUser[1 + $itemArr])
        right @else wrong @endif
@endif">
                            <label class="form-check-label ">
                                {{ $have_session_choicesUser[4 + $itemArr] }}
                            </label>
                        </div>
                    @else
                        <div class="form-check @if ($have_session_choicesUser[4] == $have_session_choicesUser[1]) right @endif @if ($have_session_choicesUser[6] == $have_session_choicesUser[4]) @if ($have_session_choicesUser[6] == $have_session_choicesUser[1])
                    right @else wrong @endif
                    @endif">

                            <label class="form-check-label">
                                {{ $have_session_choicesUser[4] }}
                            </label>
                        </div>
                    @endif










                    @if ($i > 5)
                        <div
                            class="form-check @if ($have_session_choicesUser[5 + $itemArr] == $have_session_choicesUser[1 + $itemArr]) right @endif @if ($have_session_choicesUser[6 + $itemArr] == $have_session_choicesUser[5 + $itemArr]) @if ($have_session_choicesUser[6 + $itemArr] == $have_session_choicesUser[1 + $itemArr])
        right @else wrong @endif
@endif">
                            <label class="form-check-label">
                                {{ $have_session_choicesUser[5 + $itemArr] }}
                            </label>
                        </div>
                    @else
                        <div class="form-check  @if ($have_session_choicesUser[5] == $have_session_choicesUser[1]) right @endif @if ($have_session_choicesUser[6] == $have_session_choicesUser[5]) @if ($have_session_choicesUser[6] == $have_session_choicesUser[1])
                    right @else wrong @endif
                    @endif">
                            <label class="form-check-label">
                                {{ $have_session_choicesUser[5] }}
                            </label>
                        </div>
                    @endif
                </div>
            </section>
            <div class="d-none">{{ $i += $itemArr }}</div>
        @endfor


@endif
</div>
