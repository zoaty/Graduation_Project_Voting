<x-admin-master>
  
  @section('content')
    <div class="row">
      
    <?php
      $voteEndDate = $candidates[0]->voteEndDate;
      $voteEndingDate = new DateTime($voteEndDate);
      $currentDate = new DateTime;
    ?>

    @if($voteEndingDate >= $currentDate)
      <div class="d-flex flex-column mx-auto mt-3">
        <h1 class="display-4">Final Voting Date for this voting is: </h1>
        <p class="text-center" style="font-size:60px; font-weight:700;">{{$candidates[0]->finish}} 23:59</p>
      </div>

      <form class="d-flex col border border-dark" method="POST" action="{{route('vote.store')}}">
        @csrf
          <div class="col">
            <div class="form-group d-flex justify-content-center">
                <img class="border border-dark border-width-3 mt-3 mb-4" src="{{ asset('Profile-Images/kim.jpg') }}" alt="profile-image">
            </div>

            <div class="form-group input-group-lg">
                <input readonly type="text" name="cname" id="cname" value="{{$candidates[0]->candidate_name}}" class="form-control" placeholder="Candidate Name">
            </div>

            <div class="form-group input-group-lg">
                <input readonly type="text" name="csurname" value="{{$candidates[0]->candidate_surname}}" id="csurname" class="form-control" placeholder="Candidate Surname">
            </div>

            <div class="form-group input-group-lg">
                <input readonly type="text" name="cparty" value="{{$candidates[0]->candidate_party}}" id="cparty" class="form-control" placeholder="Candidate Party">
            </div>

            <div class="form-group input-group d-flex justify-content-center">
                @if(auth()->user()->userHasRole('Voted'))
                  <h1 style="color: red;"><strong>Unavailable</strong></h1>
                @else
                  <h5><strong> I confirm my vote.</strong></h5>
                  <input required class="ml-2" type="radio" name="voteRadio" id="vote1" value="vote1" />
                @endif
            </div>

            <!-- MODAL Candidate -->
            <div class="form-group input-group" style="font-size:20px;">
              <a href="" data-toggle="modal" data-target="#candidateInfo">More information about the canditate.</a>

              <div class="modal fade" id="candidateInfo" tabindex="-1" role="dialog" aria-labelledby="informationModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title" id="candidateTitle"><strong>Information About {{$candidates[0]->candidate_name}}</strong></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body h3">
                      <strong>{{$candidates[0]->candidate_info}}</strong>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="mt-5 d-flex justify-content-center">
              <input type="hidden" name="role" value="5">
              <button type="button" class="btn-lg pl-5 pr-5 mb-3" @if(auth()->user()->userHasRole('Voted')) disabled hidden @endif data-toggle="modal" data-target="#voteConfirm" >Vote</button>
            </div>

            <!-- MODAL -->
            <div class="modal fade" id="voteConfirm" tabindex="-1" role="dialog" aria-labelledby="voteConfirmModal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                  <div class="modal-header">
                    <h5 class="modal-title" id="voteConfirmTitle"><strong>Vote Confirm</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>

                  <div class="modal-body h3">
                    Are you confirming that you are voting for <strong>{{$candidates[0]->candidate_name}}</strong>?
                  </div>

                  <div class="modal-footer">
                    <button type="submit" action="vote" value="vote" class="btn-lg btn-primary">Yes</button>
                    <button type="button" class="btn-lg btn-danger" data-dismiss="modal">No</button>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="form-group d-flex justify-content-center">
              <img class="border border-dark border-width-3 mt-3 mb-4" src="{{ asset('Profile-Images/putin.jpg') }}" alt="profile-image">
            </div>

            <div class="form-group input-group-lg">
              <input readonly type="text" name="cname2" value="{{$candidates[1]->candidate_name}}" id="cname2" class="form-control" placeholder="Candidate Name">
            </div>

            <div class="form-group input-group-lg">
              <input readonly type="text" name="csurname" value="{{$candidates[1]->candidate_surname}}" id="csurname" class="form-control" placeholder="Candidate Surname">
            </div>

            <div class="form-group input-group-lg">
              <input readonly type="text" name="cparty" value="{{$candidates[1]->candidate_party}}" id="cparty" class="form-control" placeholder="Candidate Party">
            </div>

            <div class="form-group input-group d-flex justify-content-center">
              @if(auth()->user()->userHasRole('Voted'))
                <h1 style="color: red;"><strong>Unavailable</strong></h1>
              @else
                <h5><strong> I confirm my vote.</strong></h5>
                <input class="ml-2" type="radio" name="voteRadio" id="vote2" value="vote2" />
              @endif
            </div>

            <!-- MODAL Candidate -->
            <div class="form-group input-group" style="font-size:20px;">
              <a href="" data-toggle="modal" data-target="#candidateInfo2">More information about the canditate.</a>

              <div class="modal fade" id="candidateInfo2" tabindex="-1" role="dialog" aria-labelledby="informationModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title" id="candidateTitle"><strong>Information About {{$candidates[1]->candidate_name}}</strong></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body h3">
                      <strong>{{$candidates[1]->candidate_info}}</strong>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="mt-5 d-flex justify-content-center">
              <input type="hidden" name="role" value="5">
              <button type="button" class="btn-lg pl-5 pr-5 mb-3" @if(auth()->user()->userHasRole('Voted')) disabled hidden @endif data-toggle="modal" data-target="#voteConfirm2">Vote</button>
            </div>

            <!-- MODAL -->
            <div class="modal fade" id="voteConfirm2" tabindex="-1" role="dialog" aria-labelledby="voteConfirmModal2" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                  <div class="modal-header">
                    <h5 class="modal-title" id="voteConfirmTitle2"><strong>Vote Confirm</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>

                  <div class="modal-body h3">
                    Are you confirming that you are voting for <strong>{{$candidates[1]->candidate_name}}</strong>?
                  </div>

                  <div class="modal-footer">
                    <button type="submit" action="vote2" value="vote2" class="btn-lg btn-primary">Yes</button>
                    <button type="button" class="btn-lg btn-danger" data-dismiss="modal">No</button>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="form-group d-flex justify-content-center">
              <img class="border border-dark border-width-3 mt-3 mb-4" src="{{ asset('Profile-Images/erdoğan.jpg') }}" alt="profile-image">
            </div>

            <div class="form-group input-group-lg">
              <input readonly type="text" name="cname3" value="{{$candidates[2]->candidate_name}}" id="cname3" class="form-control" placeholder="Candidate Name">
            </div>

            <div class="form-group input-group-lg">
              <input readonly type="text" name="csurname" value="{{$candidates[2]->candidate_surname}}" id="csurname" class="form-control" placeholder="Candidate Surname">
            </div>

            <div class="form-group input-group-lg">
              <input readonly type="text" name="cparty" value="{{$candidates[2]->candidate_party}}" id="cparty" class="form-control" placeholder="Candidate Party">
            </div>

            <div class="form-group input-group d-flex justify-content-center">
              @if(auth()->user()->userHasRole('Voted'))
                <h1 style="color: red;"><strong>Unavailable</strong></h1>
              @else
                <h5><strong> I confirm my vote.</strong></h5>
                <input class="ml-2" type="radio" name="voteRadio" id="vote3" value="vote3" />
              @endif
            </div>

            <!-- MODAL Candidate -->
            <div class="form-group input-group" style="font-size:20px;">
              <a href="" data-toggle="modal" data-target="#candidateInfo3">More information about the canditate.</a>

              <div class="modal fade" id="candidateInfo3" tabindex="-1" role="dialog" aria-labelledby="informationModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title" id="candidateTitle"><strong>Information About {{$candidates[2]->candidate_name}}</strong></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body h3">
                      <strong>{{$candidates[2]->candidate_info}}</strong>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="mt-5 d-flex justify-content-center">
              <input type="hidden" name="role" value="5">
              <button type="button" class="btn-lg pl-5 pr-5 mb-3" @if(auth()->user()->userHasRole('Voted')) disabled hidden @endif data-toggle="modal" data-target="#voteConfirm3">Vote</button>
            </div>

            <!-- MODAL -->
            <div class="modal fade" id="voteConfirm3" tabindex="-1" role="dialog" aria-labelledby="voteConfirmModal3" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                  <div class="modal-header">
                    <h5 class="modal-title" id="voteConfirmTitle3"><strong>Vote Confirm</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>

                  <div class="modal-body h3">
                    Are you confirming that you are voting for <strong>{{$candidates[2]->candidate_name}}</strong>?
                  </div>

                  <div class="modal-footer">
                    <button type="submit" action="vote" value="vote" class="btn-lg btn-primary">Yes</button>
                    <button type="button" class="btn-lg btn-danger" data-dismiss="modal">No</button>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="form-group d-flex justify-content-center">
              <img class="border border-dark border-width-3 mt-3 mb-4" src="{{ asset('Profile-Images/trump.jpg') }}" alt="profile-image">
            </div>

            <div class="form-group input-group-lg">
              <input readonly type="text" name="cname4" value="{{$candidates[3]->candidate_name}}" id="cname4" class="form-control" placeholder="Candidate Name">
            </div>

            <div class="form-group input-group-lg">
              <input readonly type="text" name="csurname" value="{{$candidates[3]->candidate_surname}}" id="csurname" class="form-control" placeholder="Candidate Surname">
            </div>

            <div class="form-group input-group-lg">
              <input readonly type="text" name="cparty" value="{{$candidates[3]->candidate_party}}" id="cparty" class="form-control" placeholder="Candidate Party">
            </div>

            <div class="form-group input-group d-flex justify-content-center">
              @if(auth()->user()->userHasRole('Voted'))
                <h1 style="color: red;"><strong>Unavailable</strong></h1>
              @else
              <h5><strong> I confirm my vote.</strong></h5>
                <input class="ml-2" type="radio" name="voteRadio" id="vote4" value="vote4" />
              @endif
            </div>

            <!-- MODAL Candidate -->
            <div class="form-group input-group" style="font-size:20px;">
              <a href="" data-toggle="modal" data-target="#candidateInfo4">More information about the canditate.</a>

              <div class="modal fade" id="candidateInfo4" tabindex="-1" role="dialog" aria-labelledby="informationModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title" id="candidateTitle"><strong>Information About {{$candidates[3]->candidate_name}}</strong></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body h3">
                      <strong>{{$candidates[3]->candidate_info}}</strong>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="mt-5 d-flex justify-content-center">
              <input type="hidden" name="role" value="5">
              <button type="button" class="btn-lg pl-5 pr-5 mb-3" @if(auth()->user()->userHasRole('Voted')) disabled hidden @endif data-toggle="modal" data-target="#voteConfirm4">Vote</button>
            </div>

            <!-- MODAL -->
            <div class="modal fade" id="voteConfirm4" tabindex="-1" role="dialog" aria-labelledby="voteConfirmModal4" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                  <div class="modal-header">
                    <h5 class="modal-title" id="voteConfirmTitle4"><strong>Vote Confirm</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>

                  <div class="modal-body h3">
                    Are you confirming that you are voting for <strong>{{$candidates[3]->candidate_name}}</strong>?
                  </div>

                  <div class="modal-footer">
                    <button type="submit" action="vote" value="vote" class="btn-lg btn-primary">Yes</button>
                    <button type="button" class="btn-lg btn-danger" data-dismiss="modal">No</button>
                  </div>

                </div>
              </div>
            </div>
          </div>
      </form>
    @else
    <div class="mx-auto mt-5">
      <h1 class="display-4" style="font-size:60px; font-weight:700;">This Voting has ended</h1>
    </div>
    @endif
    </div>

    <div class="row">
      @if(auth()->user()->userHasRole('Voted'))
        <div class="col">
          <div class="d-flex justify-content-center mt-5">
            <h1 class="display-1" style="color: red;"><strong> You already voted!</strong></h1>
          </div>
        </div>
      @endif
    </div>

  @endsection

</x-admin-master>