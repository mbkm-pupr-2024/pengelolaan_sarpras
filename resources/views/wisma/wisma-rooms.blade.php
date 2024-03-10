@extends('layout.index')
@section('sidebar')
@include('layout.sidebar')
@endsection
@section('nav')
@include('layout.nav')
@endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <h5 class="card-header">Kamar</h5>
        <div id="seat-results">
          <table id="displaySeats" data-seats="seat">
            <tr>
              <td id="seat-109" data-name="Suhodo 109">Suhodo 109</td>
              <td id="seat-110" data-name="Suhodo 110">Suhodo 110</td>
              <td id="seat-111" data-name="Suhodo 111">Suhodo 111</td>
              <td id="seat-112" data-name="Suhodo 112">Suhodo 112</td>
              <td id="seat-113" data-name="Suhodo 113">Suhodo 113</td>
              <td id="seat-114" data-name="Suhodo 114">Suhodo 114</td>
              <td id="seat-115" data-name="Suhodo 115">Suhodo 115</td>
            </tr>
            <tr>
              <td class="space">&nbsp;</td>
            </tr>
            <tr>
              <td id="seat-116" data-name="Suhodo 116">Suhodo 116</td>
              <td id="seat-117" data-name="Suhodo 117">Suhodo 117</td>
              <td id="seat-118" data-name="Suhodo 118">Suhodo 118</td>
              <td id="seat-119" data-name="Suhodo 119">Suhodo 119</td>
              <td id="seat-120" data-name="Suhodo 120">Suhodo 120</td>
              <td id="seat-121" data-name="Suhodo 121">Suhodo 121</td>
              <td id="seat-122" data-name="Suhodo 122">Suhodo 122</td>
              <td id="seat-123" data-name="Suhodo 123">Suhodo 123</td>
            </tr>
          </table>
          <div style="text-align: center; color: #9a031e; font-weight: bold;">
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const button = document.querySelectorAll('td');
    // convert php collection to js array
    const seats = @json($transactions);
    // check if seat is available from the server
    for (let i = 0; i < button.length; i++) {
      if (seats.includes((button[i].getAttribute('data-name')))) {
        button[i].classList.add('notAvailable');
      }
    }
    
  </script>

  @endsection