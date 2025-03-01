<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Recordings') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  <div class="container">
                    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                          <h1 class="display-4 fw-normal">Your current Plan is {{ $planOfTheUser->plan_name }} </h1>
                          <p class="fs-5 text-muted">But you can easily update you actual Plan to one of the options below. <br>
                              <b><a href="#">If you are a member of Enterprise Plan click Here</a></b>.</p>
                        </div>
                      </header>
                      <br><br>
                      <main>
                        <div class="row row-cols-1 row-cols-md-4 mb-4 text-center">
                          <!--  começo foreach roda + planos  -->
                          @foreach($existingPlans as $key => $plan)
                          <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm">
                              <div class="card ">
                                <div class="card-header">
                                  <b>
                                    {{ $plan['plan_name'] }}
                                  </b>
                                </div>
                                <div class="card-body" >
                                  <h5 class="card-title" > {{ $plan['plan_price'] }} <span>$</span><small class="text-muted">/ mo</small></h5>
                                  <br>
                                  <p class="card-text "> {{ $plan['plan_description'] }} </p>
                                  <br><br>
                                  <a href="#" class="btn btn-primary">Sign Up</a>
                                </div>
                              </div>
                            </div>
                          </div>
                          @endforeach
                        </div>
                      <br><br>
                        <h2 class="display-6 text-center mb-4">Compare plans</h2>

                        <div class="table-responsive">
                          <table class="table text-center">
                            <thead>
                              <tr>
                                <th style="width: 20%;" class="text-nowrap"></th>
                                @foreach($existingPlans as $k => $planname)
                                  <th style="width: 20%;">{{ $planname['plan_name'] }}</th>
                                @endforeach
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row" class="text-start">Respond Exercises</th>
                                  <td>
                                    <i class="fa fa-check" aria-hidden="true"></i>(*)
                                  </td>
                                  <td>
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                  <td>
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                  </td>
                                  <td>
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                  </td>
                              </tr>
                              <tr>
                                <th scope="row" class="text-start">Respond Tests</th>
                                  <td>
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                  </td>
                                  <td>
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </td>
                                <td>
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </td>
                                  <td>
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row" class="text-start">Send Tests</th>
                                  <td>
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                  </td>
                                  <td>
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                  </td>
                                  <td>
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                  </td>
                                  <td>
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                  </td>
                              </tr>
                              <tr>
                                <th scope="row" class="text-start">Answer storage (backup)</th>
                                <td>
                                  <i class="fa fa-times" aria-hidden="true" ></i>
                                </td>
                                <td>
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </td>
                                <td>
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </td>
                                <td>
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row" class="text-start">Test storage (backup)</th>
                                <td>
                                  <i class="fa fa-times" aria-hidden="true"></i>
                                </td>
                                <td>
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </td>
                                <td>
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </td>
                                <td>
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row" class="text-start"></th>
                                <td></td>
                                <td><a href="#" class="btn btn-primary">Sign Up</a></svg></td>
                                <td><a href="#" class="btn btn-primary">Sign Up</a></svg></td>
                                <td><a href="#" class="btn btn-primary">Sign Up</a></svg></td>
                              </tr>
                            </tbody>
                          </table>

                          
                        </div>
                      </main>
                      <!-- Bootstrap core JavaScript
                        ================================================== -->
                        <!-- Placed at the end of the document so the pages load faster -->
                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                        <script>window.jQuery || document.write('<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"><\/script>')</script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.8/holder.min.js"></script>
                        <script>
                          Holder.addTheme('thumb', {
                            bg: '#55595c',
                            fg: '#eceeef',
                            text: 'Thumbnail'
                          });
                        </script>
                    </div>
                  </div>
                </div>
            </div>
         </div>
      </div>
    </div>
</x-app-layout>