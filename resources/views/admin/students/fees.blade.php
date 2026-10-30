
@extends('admin.layouts.app')

@section('styles')
<style>
.school-fees-page {
    color: #26382d;
    padding-bottom: 35px;
}

.school-fees-page h3 {
    color: #1d5136;
    font-size: 25px;
    font-weight: 700;
}

.school-fees-page .text-muted {
    color: #78877d !important;
    font-size: 14px;
}

.school-fees-page .card {
    border: 1px solid #e3ebe5;
    border-radius: 14px;
    background: #fff;
    overflow: hidden;
    box-shadow: 0 5px 22px rgba(28, 65, 43, 0.06) !important;
    margin-bottom: 25px;
}

.school-fees-page .card-header {
    padding: 18px 22px;
    background: linear-gradient(135deg, #176b45, #278553) !important;
    border-bottom: none;
}

.school-fees-page .card-header h5 {
    margin: 0;
    color: #fff;
    font-size: 16px;
    font-weight: 600;
}

.school-fees-page .card-body {
    padding: 24px;
}

.school-fees-page label {
    display: block;
    margin-bottom: 8px;
    color: #344b3c;
    font-size: 13px;
    font-weight: 600;
}

.school-fees-page .form-control {
    width: 100%;
    min-height: 45px;
    padding: 11px 14px;
    color: #26382d;
    background: #fff;
    border: 1px solid #dce6df;
    border-radius: 8px;
    font-size: 14px;
    box-shadow: none;
}

.school-fees-page .form-control:focus {
    border-color: #278553;
    box-shadow: 0 0 0 3px rgba(39, 133, 83, 0.12);
}

.school-fees-page .form-control[readonly] {
    background: #f3f7f4;
    color: #637568;
}

.school-fees-page .btn {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    min-height: 40px;
    padding: 9px 15px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
}

.school-fees-page .btn-success {
    color: #fff;
    background: #21804e;
    border-color: #21804e;
}

.school-fees-page .btn-success:hover {
    color: #fff;
    background: #17653b;
    border-color: #17653b;
}

.school-fees-page .btn-outline-secondary {
    color: #46584c;
    background: #fff;
    border: 1px solid #d5e0d8;
}

.school-fees-page .btn-outline-danger {
    color: #c03939;
    background: #fffafa;
    border: 1px solid #e6bcbc;
}

.school-fees-page .badge {
    display: inline-block;
    padding: 7px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
}

.school-fees-page .badge.bg-success {
    color: #176b45;
    background: #e4f5e9 !important;
}

.school-fees-page .badge.bg-danger {
    color: #b52d36;
    background: #fdebed !important;
}

.school-fees-page .table-responsive {
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.school-fees-page .table {
    width: 100%;
    min-width: 650px;
    margin-bottom: 0;
    border-collapse: separate;
    border-spacing: 0;
    color: #425348;
    font-size: 13px;
}

.school-fees-page .table thead th {
    padding: 15px 16px;
    color: #315440;
    background: #f1f7f3;
    border: none;
    border-bottom: 1px solid #dfe9e2;
    font-size: 12px;
    font-weight: 700;
    white-space: nowrap;
}

.school-fees-page .table tbody td {
    padding: 15px 16px;
    vertical-align: middle;
    border-color: #edf1ee;
}

.school-fees-page .alert {
    padding: 14px 17px;
    border-radius: 9px;
    font-size: 13px;
    line-height: 1.7;
}

.school-fees-page .alert-success {
    color: #176b45;
    background: #edf8f0;
    border: 1px solid #ccebd5;
}

.school-fees-page .alert-danger {
    color: #a92f37;
    background: #fff0f0;
    border: 1px solid #f1cdcd;
}

.school-fees-page .alert-warning {
    color: #805d16;
    background: #fff9e9;
    border: 1px solid #f1e0ad;
}

@media (max-width: 767px) {
    .school-fees-page {
        padding-top: 15px;
    }

    .school-fees-page h3 {
        font-size: 21px;
    }

    .school-fees-page .card-header {
        padding: 15px 17px;
    }

    .school-fees-page .card-body {
        padding: 17px;
    }

    .school-fees-page .table {
        min-width: 650px;
    }

    .school-fees-page .fees-back-button {
        width: 100%;
        margin-top: 12px;
    }
}
</style>
@endsection

@section('content')

<div class="container py-4 school-fees-page">

    {{-- PAGE HEADER --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
        <div>
            <h3 class="mb-1">School Fees Payment</h3>

            <p class="text-muted mb-0">
                {{ $student->first_name }} {{ $student->last_name }}
                &mdash; {{ $student->admission_number }}
            </p>
        </div>

        <a href="{{ route('admin.students.index') }}"
           class="btn btn-outline-secondary fees-back-button">
            <i class="fa fa-arrow-left"></i> Back to Students
        </a>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    {{-- VALIDATION ERRORS --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Please correct the following:</strong>

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- CURRENT ACADEMIC PERIOD --}}
    <div class="card">
        <div class="card-header">
            <h5>Current Academic Period</h5>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <strong>Academic Session:</strong>
                    {{ $currentSession ?: 'Not configured' }}
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Current Term:</strong>
                    {{ $currentTerm ?: 'Not configured' }}
                </div>
            </div>

            @if($currentSession && $currentTerm)

    <strong>Current Payment Status:</strong>

    @if($currentPayment && strtolower(trim($currentPayment->status)) == 'paid')
        <span class="badge bg-success">Paid</span>
    @else
        <span class="badge bg-danger">Unpaid</span>
    @endif

@else

    <div class="alert alert-warning mb-0">
        Please configure the current academic session and term
        in School Settings before recording payments.
    </div>

@endif
        </div>
    </div>

    {{-- TERM PAYMENT STATUS --}}
    <div class="card">
        <div class="card-header">
            <h5>Term Payment Status</h5>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Academic Session</th>
                        <th>Term</th>
                        <th>Amount Paid</th>
                        <th>Payment Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

               
<tbody>
    @foreach($terms as $term)

        @php
            // Find payment for this student, current session and term only.
            $termPayment = $payments->first(function ($payment) use (
                $term,
                $currentSession
            ) {
                return trim((string) $payment->session) === trim((string) $currentSession)
                    && strtolower(trim((string) $payment->term)) === strtolower(trim((string) $term));
            });

            // Check whether this term has been paid in the current session.
            $isPaid = $termPayment
                && strtolower(trim((string) $termPayment->status)) === 'paid';
        @endphp

        <tr>
            <td>{{ $currentSession ?: 'Not configured' }}</td>

            <td>{{ $term }}</td>

            <td>
                @if($termPayment)
                    ₦{{ number_format((float) $termPayment->amount, 2) }}
                @else
                    —
                @endif
            </td>

            <td>
                @if($termPayment && $termPayment->payment_date)
                    {{ \Carbon\Carbon::parse($termPayment->payment_date)->format('d M Y') }}
                @else
                    —
                @endif
            </td>

            <td>
                @if($isPaid)
                    <span class="badge bg-success">Paid</span>
                @else
                    <span class="badge bg-danger">Unpaid</span>
                @endif
            </td>

            <td>
                @if(!$currentSession)
                    —

                @elseif($isPaid)

                    <form action="{{ route('admin.students.fees.mark-unpaid', ['studentId' => $student->id]) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to change this payment to unpaid?');">

                        @csrf
                        @method('PATCH')

                        <input type="hidden" name="session" value="{{ $currentSession }}">
                        <input type="hidden" name="term" value="{{ $term }}">

                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fa fa-times-circle"></i> Mark Unpaid
                        </button>
                    </form>

                @elseif($term === $nextUnpaidTerm)

                    <a href="{{ route('admin.students.fees.index', ['studentId' => $student->id]) }}?term={{ urlencode($term) }}#make-payment"
                       class="btn btn-success btn-sm">
                        <i class="fa fa-credit-card"></i> Pay Next Term
                    </a>

                @else

                    <a href="{{ route('admin.students.fees.index', ['studentId' => $student->id]) }}?term={{ urlencode($term) }}#make-payment"
                       class="btn btn-outline-secondary btn-sm">
                        Pay This Term
                    </a>

                @endif
            </td>
        </tr>

    @endforeach
</tbody>

            </table>
        </div>
    </div>

    {{-- PAYMENT FORM --}}
    @php
        $selectedTerm = request('term', $nextUnpaidTerm ?: $currentTerm);

        if (!in_array($selectedTerm, $terms)) {
            $selectedTerm = $currentTerm ?: 'First Term';
        }

        $selectedPayment = $payments->first(function ($payment) use (
            $selectedTerm,
            $currentSession
        ) {
            return trim((string) $payment->session) === trim((string) $currentSession)
                && trim((string) $payment->term) === trim((string) $selectedTerm);
        });

        $selectedTermIsPaid = $selectedPayment
            && strtolower(trim((string) $selectedPayment->status)) === 'paid';
    @endphp

    @if($currentSession)
        <div class="card" id="make-payment">
            <div class="card-header">
                <h5>Record School Fees Payment</h5>
            </div>

            <div class="card-body">

                @if($selectedTermIsPaid)
                    <div class="alert alert-success">
                        Payment for <strong>{{ $selectedTerm }}</strong>
                        has already been recorded as paid.
                    </div>

                    <form action="{{ route('admin.students.fees.mark-unpaid', ['studentId' => $student->id]) }}"
                          method="POST"
                          class="mb-4"
                          onsubmit="return confirm('Are you sure you want to change this payment status to unpaid?');">

                        @csrf
                        @method('PATCH')

                        <input type="hidden" name="session" value="{{ $currentSession }}">
                        <input type="hidden" name="term" value="{{ $selectedTerm }}">

                        <button type="submit" class="btn btn-outline-danger">
                            <i class="fa fa-undo"></i>
                            Mark {{ $selectedTerm }} as Unpaid
                        </button>
                    </form>
                @endif

                <form action="{{ route('admin.students.fees.mark-paid', ['studentId' => $student->id]) }}"
                      method="POST">

                    @csrf

                    <input type="hidden" name="session" value="{{ $currentSession }}">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Academic Session</label>

                            <input type="text"
                                   class="form-control"
                                   value="{{ $currentSession }}"
                                   readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="term">Select Term</label>

                            <select name="term" id="term" class="form-control" required>
                                @foreach($terms as $term)
                                    <option value="{{ $term }}"
                                        {{ old('term', $selectedTerm) == $term ? 'selected' : '' }}>
                                        {{ $term }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="amount">Amount Received (₦)</label>

                            <input type="number"
                                   name="amount"
                                   id="amount"
                                   class="form-control"
                                   min="0.01"
                                   step="0.01"
                                   value="{{ old('amount') }}"
                                   required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="payment_date">Payment Date</label>

                            <input type="date"
                                   name="payment_date"
                                   id="payment_date"
                                   class="form-control"
                                   value="{{ old('payment_date', date('Y-m-d')) }}"
                                   required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="payment_reference">
                                Receipt / Reference Number
                            </label>

                            <input type="text"
                                   name="payment_reference"
                                   id="payment_reference"
                                   class="form-control"
                                   value="{{ old('payment_reference') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="notes">Notes</label>

                            <input type="text"
                                   name="notes"
                                   id="notes"
                                   class="form-control"
                                   value="{{ old('notes') }}">
                        </div>

                    </div>

                    <button type="submit"
                            class="btn btn-success"
                            onclick="return confirm('Confirm that you have received this payment?');">

                        <i class="fa fa-check-circle"></i>
                        Confirm Fees Paid
                    </button>

                </form>
            </div>
        </div>
    @endif

    {{-- PAYMENT HISTORY --}}
    <div class="card">
        <div class="card-header">
            <h5>Payment History</h5>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Session</th>
                        <th>Term</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
                        <th>Reference</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($payments as $payment)
                        <tr>
                            <td>{{ $payment->session }}</td>

                            <td>{{ $payment->term }}</td>

                            <td>
                                ₦{{ number_format((float) $payment->amount, 2) }}
                            </td>

                            <td>
                                {{ $payment->payment_date
                                    ? \Carbon\Carbon::parse($payment->payment_date)->format('d M Y')
                                    : '—' }}
                            </td>

                            <td>
                                {{ $payment->payment_reference ?: '—' }}
                            </td>

                            <td>
                                @if(strtolower(trim((string) $payment->status)) === 'paid')
                                    <span class="badge bg-success">Paid</span>
                                @else
                                    <span class="badge bg-danger">Unpaid</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                No payment history available for this student.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
