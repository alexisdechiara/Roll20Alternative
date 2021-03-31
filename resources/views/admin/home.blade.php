@extends('layouts.admin')

@section('title', config('app.name')." | ".__('admin.dashboard'))

@section('dashboard', 'active')

@section('content')
    <h4 class="page-title">{{__('admin.dashboard')}}</h4>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-stats card-warning">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-users"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">{{__('admin.members')}}</p>
                                <h4 class="card-title">{{ $users }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-stats card-danger">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-gamepad"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">{{__('admin.games')}}</p>
                                <h4 class="card-title">{{ $parties }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-stats card-primary">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-newspaper-o"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">{{__('admin.character_sheets')}}</p>
                                <h4 class="card-title">{{ $characters }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center icon-warning">
                                <i class="la la-leanpub text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">{{__('admin.skills')}}</p>
                                <h4 class="card-title">{{ $skills }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 365.725 365.725" fill="#59d05d" xml:space="preserve" width="0.8em" height="0.8em">
                                                <g>
                                                    <g>
                                                        <path d="M357.29,315.48c-0.11-0.111-0.22-0.222-0.331-0.331l-14.08-13.76l-25.68-25.84l-19.04-19.04l16.88-16.88
                                                            c3.102-3.12,3.102-8.16,0-11.28l-18.24-18.24c-3.12-3.102-8.16-3.102-11.28,0l-6.56,6.56l-26.96-30.16l106.88-95.68
                                                            c1.596-1.437,2.547-3.455,2.64-5.6l3.84-76.72c0.123-2.264-0.72-4.474-2.32-6.08c-1.606-1.6-3.816-2.443-6.08-2.32l-76.72,3.76
                                                            c-2.145,0.093-4.163,1.044-5.6,2.64l-91.76,102.88L90.959,6.748c-1.437-1.596-3.455-2.547-5.6-2.64l-76.72-3.76
                                                            c-2.264-0.123-4.474,0.72-6.08,2.32c-1.6,1.606-2.443,3.816-2.32,6.08l3.84,76.72c0.093,2.145,1.044,4.163,2.64,5.6l107.04,96
                                                            l-26.88,29.68l-6.56-6.56c-3.12-3.102-8.16-3.102-11.28,0l-18.24,18.24c-3.102,3.12-3.102,8.16,0,11.28l16.88,16.88l-19.12,18.96
                                                            l-40,40c-11.443,11.488-11.407,30.078,0.081,41.521c5.483,5.461,12.9,8.537,20.639,8.559c7.772,0.026,15.232-3.056,20.72-8.56
                                                            l58.72-58.72l16.88,16.88c3.12,3.102,8.16,3.102,11.28,0l18.24-18.24c3.102-3.12,3.102-8.16,0-11.28l-6.24-6.96l34-30.32l34,30.32
                                                            l-6.56,6.56c-3.102,3.12-3.102,8.16,0,11.28l18.24,18.24c3.12,3.102,8.16,3.102,11.28,0l16.88-16.88l19.04,19.04l25.76,25.76
                                                            l13.92,13.92c11.374,11.557,29.963,11.705,41.52,0.331C368.516,345.626,368.664,327.036,357.29,315.48z M267.439,228.028
                                                            l-14.08,14.08l-30.08-30.08l16.56-14.8L267.439,228.028z M19.439,81.068l-3.2-64.56l64.56,3.2l90.88,101.6l-18.56,20.72
                                                            l-33.6-33.6c-3.356-2.874-8.406-2.483-11.28,0.873c-2.565,2.995-2.565,7.412,0,10.407l34.64,34.32l-18.4,20.72L19.439,81.068z
                                                             M38.559,345.068c-2.498,2.514-5.896,3.925-9.44,3.92c-7.358-0.546-12.881-6.954-12.334-14.312
                                                            c0.218-2.943,1.405-5.73,3.374-7.928l8-8l18.72,18.48L38.559,345.068z M58.079,325.548l-18.4-18.48l14.48-14.48l18.88,18.88
                                                            L58.079,325.548z M83.919,299.708l-18.88-18.88l13.84-12.96l18.88,18.88L83.919,299.708z M131.119,297.548l-16.8-16.8
                                                            l-30.16-30.16l-16.48-16.56l6.88-6.88l64,64L131.119,297.548z M137.119,267.068l-14.08-14.08l133.6-133.6
                                                            c3.356-2.874,3.747-7.924,0.873-11.28c-2.874-3.356-7.924-3.747-11.28-0.873c-0.313,0.268-0.605,0.56-0.873,0.873l-133.6,133.6
                                                            l-14.08-14.08l32.8-36.64l154.08-171.2l64.56-3.2l-3.2,64.56l-110.56,98.8L137.119,267.068z M194.399,237.228l17.2-14.48
                                                            l30.64,30.64l-14.08,14.08L194.399,237.228z M250.399,280.668l-16.24,17.28l-6.88-6.88l64-64l6.88,6.88l-16.88,16.88
                                                            L250.399,280.668z M267.359,286.348l19.52-18.48l13.36,13.36l-18.88,18.88L267.359,286.348z M306.559,325.548l-14.48-14.48
                                                            l18.88-18.88l14.48,14.48L306.559,325.548z M345.599,345.468l-0.64-0.4c-5.285,5.039-13.595,5.039-18.88,0l-8-8l19.28-18.32l8,8
                                                            C350.529,331.879,350.635,340.206,345.599,345.468z"/>
                                                    </g>
                                                </g>
                                            </svg>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">{{__('admin.weapons')}}</p>
                                <h4 class="card-title">{{ $weapons }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">

                                <svg height="0.8em" viewBox="0 -27 511.90708 511" width="0.8em" fill="#ff646d" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m135.9375 411.957031c-4.109375 0-7.605469-3.152343-7.960938-7.320312l-15.894531-185.808594-21
                                            .167969-38.511719c-2.136718-3.863281-.71875-8.734375 3.160157-10.855468 3.855469-2.128907 8.734375-.71875 10.855469 3.160156l21.992187 40c.535156.976562.863281 2.058594.960937 3.167968l16.039063 187.496094c.375 4.402344-2.878906 8.273438-7.289063 8.648438-.230468.015625-.46875.023437-.695312.023437zm0 0"/>
                                    <path d="m82.386719 136.574219c-2.199219 0-4.382813-.914063-5.945313-2.648438l-50.480468-56.113281c-1.582032-1.765625-2.3125-4.144531-1.976563-6.496094.347656-2.351562 1.714844-4.429687 3.730469-5.671875l104-64c3.773437-2.320312 8.6875-1.152343 11.007812 2.617188 2.3125 3.769531 1.144532 8.695312-2.617187 11.007812l-95.832031 58.976563 39.648437 44.078125 87.863281-52.71875c3.800782-2.28125 8.714844-1.039063 10.976563 2.746093 2.273437 3.789063 1.046875 8.703126-2.742188 10.972657l-93.519531 56.113281c-1.28125.761719-2.707031 1.136719-4.113281 1.136719zm0 0"/>
                                    <path d="m79.90625 176.773438c-1.078125 0-2.160156-.214844-3.183594-.664063l-71.914062-31.199219c-2.261719-.984375-3.949219-2.960937-4.558594-5.359375-.617188-2.402343-.078125-4.945312 1.449219-6.898437l38.304687-49.109375c2.703125-3.488281 7.734375-4.113281 11.222656-1.386719 3.488282 2.714844 4.105469 7.746094 1.382813 11.226562l-31.941406 40.960938 57.039062 24.75 65.488281-75.855469c2.871094-3.359375 7.941407-3.71875 11.277344-.832031 3.34375 2.878906 3.722656 7.9375.832032 11.28125l-69.328126 80.308594c-1.566406 1.808594-3.796874 2.777344-6.070312 2.777344zm0 0"/>
                                    <path d="m87.914062 216.460938c-.574218 0-1.167968-.0625-1.742187-.183594l-72-16c-4.152344-.917969-6.851563-4.925782-6.160156-9.128906l7.964843-48c.722657-4.359376 4.851563-7.328126 9.203126-6.574219 4.359374.71875 7.300781 4.839843 6.574218 9.199219l-6.726562 40.519531 57.421875 12.761719 21.816406-69.746094c1.3125-4.214844 5.777344-6.574219 10.023437-5.238282 4.210938 1.3125 6.5625 5.808594 5.242188 10.023438l-24 76.761719c-1.058594 3.390625-4.183594 5.605469-7.617188 5.605469zm0 0"/>
                                    <path d="m375.953125 411.957031c-.222656 0-.464844-.007812-.6875-.03125-4.40625-.375-7.664063-4.246093-7.289063-8.648437l16.042969-187.496094c.09375-1.121094.421875-2.191406.957031-3.167969l21.992188-40c2.128906-3.871093 7.007812-5.28125 10.859375-3.160156 3.871094 2.128906 5.285156 6.992187 3.15625 10.855469l-21.167969 38.511718-15.894531 185.808594c-.359375 4.175782-3.855469 7.328125-7.96875 7.328125zm0 0"/>
                                    <path d="m429.507812 136.574219c-1.417968 0-2.832031-.375-4.121093-1.144531l-93.519531-56.113282c-3.792969-2.269531-5.015626-7.183594-2.746094-10.972656 2.273437-3.785156 7.175781-5.027344 10.976562-2.746094l87.863282 52.71875 39.648437-44.078125-95.824219-58.960937c-3.757812-2.3125-4.925781-7.238282-2.613281-11.007813 2.300781-3.769531 7.214844-4.9375 11.007813-2.617187l104 64c2.015624 1.242187 3.382812 3.320312 3.726562 5.671875.335938 2.355469-.390625 4.730469-1.976562 6.496093l-50.480469 56.113282c-1.558594 1.71875-3.734375 2.640625-5.941407 2.640625zm0 0"/>
                                    <path d="m431.984375 176.773438c-2.269531 0-4.503906-.96875-6.054687-2.777344l-69.328126-80.308594c-2.886718-3.34375-2.511718-8.402344.832032-11.28125 3.335937-2.886719 8.402344-2.527344 11.28125.832031l65.488281 75.855469 57.039063-24.75-31.945313-40.960938c-2.71875-3.488281-2.101563-8.511718 1.386719-11.226562 3.480468-2.726562 8.511718-2.101562 11.222656 1.386719l38.304688 49.109375c1.519531 1.953125 2.0625 4.503906 1.445312 6.898437-.605469 2.398438-2.292969 4.375-4.558594 5.359375l-71.910156 31.199219c-1.050781.449219-2.128906.664063-3.203125.664063zm0 0"/>
                                    <path d="m423.976562 216.460938c-3.429687 0-6.558593-2.207032-7.621093-5.605469l-24-76.761719c-1.320313-4.214844 1.03125-8.710938 5.238281-10.023438 4.242188-1.328124 8.703125 1.03125 10.023438 5.238282l21.816406 69.746094 57.425781-12.761719-6.730469-40.519531c-.726562-4.359376 2.21875-8.488282 6.578125-9.199219 4.429688-.800781 8.488281 2.222656 9.199219 6.574219l7.96875 48c.695312 4.195312-2.007812 8.203124-6.160156 9.128906l-72 16c-.578125.121094-1.160156.183594-1.738282.183594zm0 0"/>
                                    <path d="m375.984375 16.460938h-240.078125c-4.425781 0-8-3.574219-8-8 0-4.421876 3.574219-8 8-8h240.078125c4.425781 0 8 3.578124 8 8 0 4.425781-3.574219 8-8 8zm0 0"/>
                                    <path d="m119.914062 224.460938c-2.863281 0-5.640624-1.542969-7.078124-4.253907-2.074219-3.90625-.578126-8.746093 3.328124-10.816406l136-72c3.917969-2.074219 8.742188-.570313 10.8125 3.328125 2.074219 3.902344.578126 8.742188-3.328124 10.816406l-136 72c-1.199219.628906-2.476563.925782-3.734376.925782zm0 0"/>
                                    <path d="m391.9375 224.460938c-1.253906 0-2.535156-.296876-3.734375-.925782l-136-72c-3.90625-2.074218-5.402344-6.90625-3.328125-10.816406 2.070312-3.898438 6.886719-5.402344 10.816406-3.328125l136 72c3.902344 2.070313 5.398438 6.902344 3.328125 10.816406-1.441406 2.710938-4.21875 4.253907-7.082031 4.253907zm0 0"/>
                                    <path d="m255.945312 224.460938c-.917968 0-1.863281-.160157-2.78125-.503907l-80-29.671875c-4.144531-1.535156-6.257812-6.144531-4.722656-10.28125 1.527344-4.140625 6.144532-6.261718 10.28125-4.71875l80 29.671875c4.144532 1.535157 6.253906 6.144531 4.71875 10.28125-1.191406 3.230469-4.246094 5.222657-7.496094 5.222657zm0 0"/>
                                    <path d="m255.945312 224.460938c-3.246093 0-6.304687-1.992188-7.503906-5.214844-1.535156-4.144532.578125-8.746094 4.722656-10.28125l80-29.671875c4.140626-1.542969 8.742188.578125 10.277344 4.722656 1.535156 4.140625-.574218 8.742187-4.71875 10.277344l-80 29.671875c-.914062.335937-1.855468.496094-2.777344.496094zm0 0"/>
                                    <path d="m255.945312 304.460938c-.917968 0-1.863281-.160157-2.78125-.503907l-80-29.671875c-4.144531-1.535156-6.257812-6.144531-4.722656-10.28125 1.527344-4.140625 6.144532-6.269531 10.28125-4.71875l80 29.671875c4.144532 1.535157 6.253906 6.144531 4.71875 10.28125-1.191406 3.230469-4.246094 5.222657-7.496094 5.222657zm0 0"/>
                                    <path d="m255.945312 304.460938c-3.246093 0-6.304687-1.992188-7.503906-5.214844-1.535156-4.144532.578125-8.746094 4.722656-10.28125l80-29.671875c4.140626-1.558594 8.742188.578125 10.277344 4.722656 1.535156 4.140625-.574218 8.742187-4.71875 10.277344l-80 29.671875c-.914062.335937-1.855468.496094-2.777344.496094zm0 0"/>
                                    <path d="m255.945312 384.460938c-.917968 0-1.863281-.160157-2.78125-.503907l-80-29.671875c-4.144531-1.535156-6.257812-6.144531-4.722656-10.28125 1.527344-4.140625 6.144532-6.261718 10.28125-4.71875l80 29.671875c4.144532 1.535157 6.253906 6.144531 4.71875 10.28125-1.191406 3.230469-4.246094 5.222657-7.496094 5.222657zm0 0"/>
                                    <path d="m255.945312 384.460938c-3.246093 0-6.304687-1.992188-7.503906-5.214844-1.535156-4.144532.578125-8.746094 4.722656-10.28125l80-29.671875c4.140626-1.542969 8.742188.578125 10.277344 4.722656 1.535156 4.140625-.574218 8.742187-4.71875 10.277344l-80 29.671875c-.914062.335937-1.855468.496094-2.777344.496094zm0 0"/>
                                    <path d="m255.945312 456.460938c-.917968 0-1.863281-.160157-2.78125-.503907l-120-44.503906c-4.144531-1.535156-6.257812-6.144531-4.722656-10.28125 1.527344-4.140625 6.160156-6.277344 10.28125-4.71875l120 44.503906c4.144532 1.535157 6.253906 6.144531 4.71875 10.28125-1.191406 3.230469-4.246094 5.222657-7.496094 5.222657zm0 0"/>
                                    <path d="m255.945312 456.460938c-3.246093 0-6.304687-1.992188-7.503906-5.214844-1.535156-4.144532.578125-8.746094 4.722656-10.28125l120-44.503906c4.140626-1.558594 8.75.578124 10.277344 4.722656 1.535156 4.140625-.574218 8.742187-4.71875 10.277344l-120 44.503906c-.914062.335937-1.855468.496094-2.777344.496094zm0 0"/>
                                    <path d="m175.914062 80.460938c-2.664062 0-5.273437-1.328126-6.792968-3.757813l-40-64c-2.34375-3.753906-1.199219-8.6875 2.535156-11.023437 3.761719-2.355469 8.683594-1.210938 11.027344 2.535156l40 64c2.34375 3.75 1.199218 8.6875-2.539063 11.023437-1.316406.832031-2.78125 1.222657-4.230469 1.222657zm0 0"/>
                                    <path d="m335.976562 80.460938c-1.445312 0-2.910156-.390626-4.230468-1.214844-3.742188-2.335938-4.878906-7.273438-2.535156-11.023438l40-64c2.335937-3.753906 7.269531-4.890625 11.023437-2.535156 3.742187 2.335938 4.878906 7.269531 2.535156 11.023438l-40 64c-1.519531 2.421874-4.128906 3.75-6.792969 3.75zm0 0"/>
                                    <path d="m255.9375 80.460938c-1.75 0-3.511719-.566407-4.992188-1.75l-80-64c-3.445312-2.769532-4.007812-7.800782-1.246093-11.25 2.773437-3.429688 7.800781-4.007813 11.246093-1.246094l80 64c3.449219 2.765625 4.007813 7.800781 1.25 11.246094-1.585937 1.96875-3.90625 3-6.257812 3zm0 0"/>
                                    <path d="m255.953125 80.460938c-2.351563 0-4.671875-1.023438-6.253906-3-2.761719-3.457032-2.191407-8.488282 1.246093-11.246094l80-64c3.464844-2.769532 8.496094-2.199219 11.25 1.246094 2.75 3.449218 2.191407 8.488281-1.25 11.25l-80 64c-1.480468 1.183593-3.238281 1.75-4.992187 1.75zm0 0"/>
                                    <path d="m255.945312 104.460938c-4.421874 0-8-3.574219-8-8v-24c0-4.421876 3.578126-8 8-8 4.425782 0 8 3.578124 8 8v24c0 4.425781-3.574218 8-8 8zm0 0"/>
                                    <path d="m175.945312 426.773438c-4.421874 0-8-3.574219-8-8v-231.984376c0-4.421874 3.578126-8 8-8 4.425782 0 8 3.578126 8 8v231.984376c0 4.425781-3.574218 8-8 8zm0 0"/>
                                    <path d="m335.945312 426.773438c-4.421874 0-8-3.574219-8-8v-231.984376c0-4.421874 3.578126-8 8-8 4.425782 0 8 3.578126 8 8v231.984376c0 4.425781-3.574218 8-8 8zm0 0"/>
                                </svg>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">{{__('admin.armors')}}</p>
                                <h4 class="card-title">{{ $armors }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-stats">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-cube text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">{{__('admin.items')}}</p>
                                <h4 class="card-title">{{ $items }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title">{{__('admin.last_users')}}</h4>
                    <p class="card-category">
                        <a href="{{ route('dashboard_users') }}">{{__('admin.access_members_list')}}</a>
                    </p>
                </div>
                <div class="card-body">
                    <table class="table table-head-bg-primary table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{__('admin.first_name')}}</th>
                            <th scope="col">{{__('admin.name')}}</th>
                            <th scope="col">{{__('admin.creation')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($last_users as $lu)
                            <tr>
                                <td>{{ userSlug($lu) }}</td>
                                <td>{{ $lu['first_name'] }}</td>
                                <td>{{ $lu['last_name'] }}</td>
                                <td>{{ $lu['created_at'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title">{{__('admin.last_games')}}</h4>
                    <p class="card-category">
                        <a href="{{ route('dashboard_parties') }}">{{__('admin.access_games_list')}}</a>
                    </p>
                </div>
                <div class="card-body">
                    <table class="table table-head-bg-primary table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{__('admin.name')}}</th>
                            <th scope="col">{{__('admin.GM')}}</th>
                            <th scope="col">{{__('admin.creation')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($last_parties as $lp)
                            <tr>
                                <td>{{ $lp['slug'] }}</td>
                                <td>{{ $lp['name'] }}</td>
                                <td>{{ userSlug(getUser($lp['user_id'], null)) }}</td>
                                <td>{{ $lp['created_at'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop