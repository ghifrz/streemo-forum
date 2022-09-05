<div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a href="/dashboard">
                        <i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li>

                    <li class="nav-label">Pertanyaan</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">Menu Forum Diskusi</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/pertanyaan">Lihat Semua Pertanyaan</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Lihat Berdasakan kategori</a>
                                <ul aria-expanded="false">
                            @foreach ($kategori as $item)
                            <li><a href="/kategori/{{$item->id}}">{{$item->nama}}</a></li>
                            @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Menu Kategori</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/kategori">Lihat Daftar Kategori</a></li>
                            <li><a href="/kategori/create">Tambah Kategori</a></li>
                        </ul>
                    </li>

                    </li>
                </ul>
            </div>
        </div>
