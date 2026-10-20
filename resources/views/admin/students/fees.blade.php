
@extends('admin.layouts.app')
@section('styles')
<style>


/* =========================================
   EDUGREEN SCHOOL FEES PAYMENT PAGE
========================================= */

.school-fees-page {
    color: #26382d;
    padding-bottom: 35px;
}

/* Page Header */
.school-fees-page .fees-page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 28px;
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

/* Cards */
.school-fees-page .card {
    border: 1px solid #e3ebe5;
    border-radius: 14px;
    background: #ffffff;
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
    color: #ffffff;
    font-size: 16px;
    font-weight: 600;
}

.school-fees-page .card-body {
    padding: 24px;
}

/* Current Academic Period */
.school-fees-page .card-body strong {
    color: #263e30;
    font-weight: 600;
}

.school-fees-page .card-body .row > div {
    line-height: 1.8;
}

/* Form Labels */
.school-fees-page label {
    display: block;
    margin-bottom: 8px;
    color: #344b3c;
    font-size: 13px;
    font-weight: 600;
}

/* Text, Number and Date Inputs */
.school-fees-page .form-control {
    width: 100%;
    min-height: 45px;
    padding: 11px 14px;
    color: #26382d;
    background-color: #ffffff;
    border: 1px solid #dce6df;
    border-radius: 8px;
    font-size: 14px;
    box-shadow: none;
    transition: border-color 0.2s ease,
                box-shadow 0.2s ease;
}

.school-fees-page .form-control:focus {
    border-color: #278553;
    box-shadow: 0 0 0 3px rgba(39, 133, 83, 0.12);
    outline: none;
}

.school-fees-page .form-control[readonly] {
    background-color: #f3f7f4;
    color: #637568;
    cursor: default;
}

/* Buttons */
.school-fees-page .btn {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    min-height: 42px;
    padding: 10px 17px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s ease;
}

.school-fees-page .btn-success {
    color: #ffffff;
    background: #21804e;
    border-color: #21804e;
}

.school-fees-page .btn-success:hover {
    color: #ffffff;
    background: #17653b;
    border-color: #17653b;
    transform: translateY(-1px);
}

.school-fees-page .btn-outline-secondary {
    color: #46584c;
    background: #ffffff;
    border: 1px solid #d5e0d8;
}

.school-fees-page .btn-outline-secondary:hover {
    color: #1d5136;
    background: #f2f8f4;
    border-color: #278553;
}

.school-fees-page .btn-outline-danger {
    color: #c03939;
    background: #fffafa;
    border-color: #e6bcbc;
}

.school-fees-page .btn-outline-danger:hover {
    color: #ffffff;
    background: #c03939;
    border-color: #c03939;
}

/* Status Badges */
.school-fees-page .badge {
    display: inline-block;
    padding: 7px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.3px;
}

.school-fees-page .badge-success,
.school-fees-page .badge.bg-success {
    color: #176b45;
    background: #e4f5e9 !important;
}

.school-fees-page .badge-danger,
.school-fees-page .badge.bg-danger {
    color: #b52d36;
    background: #fdebed !important;
}

/* Tables */
.school-fees-page .table-responsive {
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.school-fees-page .table {
    width: 100%;
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

.school-fees-page .table-hover tbody tr:hover {
    background-color: #f8fbf9;
}

.school-fees-page .table-bordered {
    border: 1px solid #e3ebe5;
}

.school-fees-page .table-bordered th,
.school-fees-page .table-bordered td {
    border: 1px solid #e3ebe5;
}

/* Alerts */
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

/* Mobile */
@media (max-width: 767px) {
    .school-fees-page {
        padding-top: 15px;
    }

    .school-fees-page .fees-page-header {
        align-items: flex-start;
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

    .school-fees-page .btn {
        font-size: 12px;
    }

    .school-fees-page .fees-page-header .btn {
        width: 100%;
    }

    .school-fees-page .table {
        min-width: 620px;
    }

    .school-fees-page form .btn {
        max-width: 100%;
        white-space: normal;
    }
}


</style>


@endsection
@section('content')

<div class="container py-4 school-fees-page">

    <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
        <div>
            <h3 class="mb-1">School Fees Payment</h3>
            <p class="text-muted mb-0">
                {{ $student->first_name }} {{ $student->last_name }}
                &mdash; {{ $student->admission_number }}
            </p>
        </div>

        <a href="{{ route('admin.students.index') }}"
           class="btn btn-outline-secondary">
            <i class="fa fa-arrow-left"></i> Back to Students
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

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

   <div class="fees-page-header">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Current Academic Period</h5>
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
                <p class="mb-0">
                    <strong>Current Payment Status:</strong>

                    @if($currentPayment && $currentPayment->status === 'paid')
                        <span class="badge badge-success bg-success">Paid</span>
                    @else
                        <span class="badge badge-danger bg-danger">Unpaid</span>
                    @endif
                </p>
            @else
                <div class="alert alert-warning mb-0">
                    Configure the current session and term in School Settings
                    before recording payments.
                </div>
            @endif
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Term Payment Status</h5>
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
                    </tr>
                </thead>

                
<tbody>
    @foreach($terms as $term)
        @php
            $termPayment = $payments->first(function ($payment) use ($term, $currentSession) {
                return trim((string) $payment->session) === trim((string) $currentSession)
                    && trim((string) $payment->term) === trim((string) $term);
            });

            $isPaid = $termPayment
                && strtolower(trim((string) $termPayment->status)) === 'paid';
        @endphp

        <tr>
            <td>{{ $currentSession ?: 'Not configured' }}</td>
            <td>{{ $term }}</td>

            <td>
                @if($isPaid)
                    ₦{{ number_format((float) $termPayment->amount, 2) }}
                @else
                    —
                @endif
            </td>

            <td>
                @if($isPaid && $termPayment->payment_date)
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
        </tr>
    @endforeach
</tbody>

            </table>
        </div>
    </div>

    @if($currentSession && $currentTerm)
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Record Current Term Payment</h5>
            </div>

            <div class="card-body">
                @if($currentPayment && $currentPayment->status === 'paid')
                    <div class="alert alert-success">
                        Fees have already been recorded as paid for
                        <strong>{{ $currentTerm }}</strong>,
                        {{ $currentSession }}.
                    </div>

                    <form action="{{ route('admin.students.fees.mark-unpaid', $student->id) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to change this payment status to unpaid?');">
                        @csrf
                        @method('PATCH')

                        <button type="submit" class="btn btn-outline-danger">
                            <i class="fa fa-undo"></i> Mark as Unpaid
                        </button>
                    </form>
                @else
                    <form action="{{ route('admin.students.fees.mark-paid', $student->id) }}"
                          method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Academic Session</label>
                                <input type="text"
                                       class="form-control"
                                       value="{{ $currentSession }}"
                                       readonly>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Term</label>
                                <input type="text"
                                       class="form-control"
                                       value="{{ $currentTerm }}"
                                       readonly>
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
                                <label for="payment_reference">Receipt / Reference Number</label>
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

                        <button type="submit" class="btn btn-success"
                                onclick="return confirm('Confirm that you have received this payment?')">
                            <i class="fa fa-check-circle"></i> Confirm Fees Paid
                        </button>
                    </form>
                @endif
            </div>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Payment History</h5>
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
                            <td>₦{{ number_format($payment->amount, 2) }}</td>
                            <td>{{ $payment->payment_date?->format('d M Y') ?? '—' }}</td>
                            <td>{{ $payment->payment_reference ?: '—' }}</td>
                            <td>
                                @if($payment->status === 'paid')
                                    <span class="badge bg-success">Paid</span>
                                @else
                                    <span class="badge bg-danger">Unpaid</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                No payment history for this session yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
