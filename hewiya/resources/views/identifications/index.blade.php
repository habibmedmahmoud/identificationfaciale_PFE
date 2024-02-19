<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Identifications
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

                <div class="container mx-auto">
                    <div class="flex flex-col">
                        <div class="w-full">
                            <div class="p-4 border-b border-gray-200 shadow">
                                <!-- <table> -->
                                <table id="dataTable" class="p-4">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th class="p-8 text-xs text-gray-500">
                                            ID
                                        </th>
                                        <th class="p-8 text-xs text-gray-500">
                                            Nom et prénom
                                        </th>
                                        <th class="p-8 text-xs text-gray-500">
                                            Email
                                        </th>
                                        <th class="p-8 text-xs text-gray-500">
                                            Statut
                                        </th>
                                        <th class="px-6 py-2 text-xs text-gray-500">
                                            NNI
                                        </th>
                                        <th class="px-6 py-2 text-xs text-gray-500">
                                            Telephone
                                        </th>
                                        <th class="px-6 py-2 text-xs text-gray-500">
                                            Resultat IA
                                        </th>
                                        <th class="px-6 py-2 text-xs text-gray-500">
                                            Resultat humain
                                        </th>
                                        <th>

                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                    @foreach($identifications as $id)
                                    <tr class="whitespace-nowrap">
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            {{$id->id}}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="text-sm text-gray-900">
                                                {{$id->firstName }}{{$id->lastName}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="text-sm text-gray-500">{{$id->email}}</div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            {{$id->status}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            {{$id->nni}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            {{$id->tel}}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            @if(!$id->matching)
                                                Non traité
                                            @elseif($id->matching==1)
                                                Validé
                                            @else
                                                Rejeté
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            @if(!$id->matching_human)
                                                Non traité
                                            @elseif($id->matching_human==1)
                                                Validé
                                            @else
                                                Rejeté
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center">

                                            <a href="/identifications/show/{{$id->id}}" class="btn btn-xs btn-primary">Afficher</a>
                                        </td>
                                    </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

        </div>
    </div>

</x-app-layout>


