<div class="page-wrapper">

    <!-- /.col-lg-12 -->
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-6" >
                <div class="white-box analytics-info" style="background-color: green">
                    <h3 class="box-title text-white">Number of Mazao Registerd</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <i class="fas fa-seedling fa-3x text-white"></i>
                        </li>
                        <li class="ms-auto"><span class="counter text-white">{{ $jumlayamazao }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="white-box analytics-info" style="background-color: rgb(53, 105, 53)">
                    <h3 class="box-title text-white">Total Fake Reports</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <li>
                                <i class="fas fa-seedling fa-3x text-white"></i>
                            </li>
                            
                        </li>
                        
                        <li class="ms-auto"><span class="counter text-white">{{ $jumlayamazao }}</span></li>
                    </ul>
                </div>
            </div>


        </div>
        
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="d-md-flex mb-3">
                        <h3 class="box-title mb-0">Bei za Mazao</h3>
                        {{-- <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                            <select class="form-select shadow-none row border-top">
                                <option>March 2021</option>
                                <option>April 2021</option>
                                <option>May 2021</option>
                                <option>June 2021</option>
                                <option>July 2021</option>
                            </select>
                        </div> --}}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped mt-2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Kundi la Zao</th>
                                    <th>Bei ya kuanzia</th>
                                    <th>Bei ya Juu</th>
                                    @if (auth()->user()->hasRole('super-admin'))
                                        <th>Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($beizamazaos as $beizamazao)
                                    <tr>
                                        <td> {{ $loop->iteration }}</td>
                                        <td>{{ $beizamazao->name }}</td>
                                        <td>{{ $beizamazao->makundiyamazao->jinalakundi }}</td>
                                        <td>Tsh.{{ $beizamazao->min_price }}</td>
                                        <td>Tsh.{{ $beizamazao->max_price }}</td>
                                        @if (auth()->user()->hasRole('super-admin'))
                                            <td>
                                                <a href="{{ route('beizamazaos.edit', $beizamazao) }}" class="btn btn-warning">Edit</a>
                                                <form action="{{ route('beizamazaos.delete', $beizamazao) }}" method="POST"
                                                    class="d-inline" onsubmit="return confirm('Are you sure you want to delete this?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
            
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">Products Yearly Sales</h3>
                    <div class="d-md-flex">
                        <ul class="list-inline d-flex ms-auto">
                            <li class="ps-3">
                                <h5><i class="fa fa-circle me-1 text-info"></i>Product</h5>
                            </li>
                            <li class="ps-3">
                                <h5><i class="fa fa-circle me-1 text-inverse"></i>Fake Product</h5>
                            </li>
                        </ul>
                    </div>
                    <div style="display: flex; justify-content: center; align-items: center; height: 405px;">
                        <canvas id="productChart" style="height: 300px; width: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
