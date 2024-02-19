<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Identification de {{ $identification->firstName }} {{ $identification->firstName }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('patient-not-found'))
                <div
                    class="flex justify-between text-orange-200 shadow-inner rounded p-3 bg-orange-600"
                >
                    <p class="self-center"><strong>Warning </strong>{{session()->pull('patient-not-found')}}</p>
                    <strong class="text-xl align-center cursor-pointer alert-del"
                    >&times;</strong
                    >
                </div><br>
            @endif
        </div>
        <div class="card">
            <div class="card-header">
                <a href="#" >
                    <i class="fas fa-arrow-left fa-3x" style="color: black"></i>
                </a>

                <a href="#" style="float: right">
                    <i class="fas fa-arrow-right fa-3x" style="color: black" ></i>
                </a>
            </div>
            
            <div class="card-header">
                <a href="#"  style=" margin-left: 50px; float: right">
                <a class="modal-effect btn btn-success " data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">valider</a>
                <div class="modal" id="modaldemo8">
			<div class="modal-dialog" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Pourcentage</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
                    <form action="{{ route('identifications.store' , $identification->id) }}" method="POST">
                        @csrf
					<div class="modal-body">
                        <div class="form-group"> 
                            <label for="exampleInputEmail">Pourcentage</label>
                            <input type="text" class="form-control" id="Pourcentage" name="Pourcentage" required>
                        </div>
					</div>
                   
					<div class="modal-footer">
						<button class="btn ripple btn-success"  type="submit">Save</button>
						<button class="btn btn-danger" data-dismiss="modal" >Close</button>
					</div>
                    
                    </form>  
				</div>
			</div>
		</div>
		<!-- End Basic modal -->
        <script src="{{URL::asset('assets/js/modal.js')}}"></script>
</div>

        <div class="row-group-item">

              <form action="{{ route('identifications.update' , $identification->id) }}" method="GET">
                 

                      <div class="input-group">
                          <span class="input-group-btn">
                              <button class="btn btn-danger" type="submit">masqué</button>
                          </span>
                      </div>
                  </form>
              </div>
     

     @if(!$identification->matching)
                Non traité
                
            @elseif($identification->matching==1)
                Validé par la IA 
            @else
                Rejeté par la IA
               
            @endif
            <div class="row">
            
                <div class="col">
               
                    @if($identification->file1Name)
                        <div class="card-body">
                            <img  src="/identifications/get_file/{{$identification->file1Name}}" />
                           
                        </div>
                    @endif
                </div>
                <div class="col">
                    @if($identification->file2Name)
                        <div class="card-body">
                            <img  style="height:290px;" src="/identifications/get_file/{{$identification->file2Name}}" />
                           
                        
                    @endif
                   
                </div>
               
            </div>
           
        </div>
       
    </div>
   
</x-app-layout>

