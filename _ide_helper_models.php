<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int|null $disease_id
 * @property int|null $doctor_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Disease|null $disease
 * @property-read \App\Models\Doctor|null $doctor
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bookmark newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bookmark newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bookmark query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bookmark whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bookmark whereDiseaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bookmark whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bookmark whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bookmark whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bookmark whereUserId($value)
 */
	class Bookmark extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Division> $divisions
 * @property-read int|null $divisions_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Country whereUpdatedAt($value)
 */
	class Country extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string|null $causes
 * @property string|null $prevention
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Medicine> $medicines
 * @property-read int|null $medicines_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Symptom> $symptoms
 * @property-read int|null $symptoms_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disease newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disease newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disease query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disease whereCauses($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disease whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disease whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disease whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disease whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disease wherePrevention($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disease whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Disease whereUpdatedAt($value)
 */
	class Disease extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $division_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Division $division
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Thana> $thanas
 * @property-read int|null $thanas_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|District whereUpdatedAt($value)
 */
	class District extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $country_id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Country $country
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\District> $districts
 * @property-read int|null $districts_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Division whereUpdatedAt($value)
 */
	class Division extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $slug
 * @property string|null $specialization
 * @property string|null $degree
 * @property int|null $experience_year
 * @property string|null $bio
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OnlineConsultation> $consultations
 * @property-read int|null $consultations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Hospital> $hospitals
 * @property-read int|null $hospitals_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DoctorReview> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DoctorSchedule> $schedules
 * @property-read int|null $schedules_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Doctor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Doctor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Doctor query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Doctor whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Doctor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Doctor whereDegree($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Doctor whereExperienceYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Doctor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Doctor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Doctor whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Doctor whereSpecialization($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Doctor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Doctor whereUserId($value)
 */
	class Doctor extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $doctor_id
 * @property int $rating
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Doctor $doctor
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorReview query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorReview whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorReview whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorReview whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorReview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorReview whereUserId($value)
 */
	class DoctorReview extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $doctor_id
 * @property int $hospital_id
 * @property int $day_of_week
 * @property string $start_time
 * @property string $end_time
 * @property numeric|null $visit_fee
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Doctor $doctor
 * @property-read \App\Models\Hospital $hospital
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorSchedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorSchedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorSchedule query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorSchedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorSchedule whereDayOfWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorSchedule whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorSchedule whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorSchedule whereHospitalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorSchedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorSchedule whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorSchedule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DoctorSchedule whereVisitFee($value)
 */
	class DoctorSchedule extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $slug
 * @property string|null $type
 * @property string|null $address
 * @property string|null $phone
 * @property int $thana_id
 * @property int|null $country_id
 * @property numeric|null $latitude
 * @property numeric|null $longitude
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Country|null $country
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Doctor> $doctors
 * @property-read int|null $doctors_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\HospitalFeature> $features
 * @property-read int|null $features_count
 * @property-read \App\Models\User $owner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\HospitalReview> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DoctorSchedule> $schedules
 * @property-read int|null $schedules_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\HospitalService> $services
 * @property-read int|null $services_count
 * @property-read \App\Models\Thana $thana
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hospital newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hospital newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hospital query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hospital whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hospital whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hospital whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hospital whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hospital whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hospital whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hospital whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hospital whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hospital wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hospital whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hospital whereThanaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hospital whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hospital whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Hospital whereUserId($value)
 */
	class Hospital extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $hospital_id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Hospital $hospital
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalFeature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalFeature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalFeature query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalFeature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalFeature whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalFeature whereHospitalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalFeature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalFeature whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalFeature whereUpdatedAt($value)
 */
	class HospitalFeature extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property int $hospital_id
 * @property int $rating
 * @property string|null $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Hospital $hospital
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalReview query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalReview whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalReview whereHospitalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalReview whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalReview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalReview whereUserId($value)
 */
	class HospitalReview extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $hospital_id
 * @property string $name
 * @property numeric $price
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Hospital $hospital
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalService query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalService whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalService whereHospitalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalService whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalService wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HospitalService whereUpdatedAt($value)
 */
	class HospitalService extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $brand_name
 * @property string|null $generic_name
 * @property string|null $company
 * @property string|null $dosage_form
 * @property string|null $strength
 * @property numeric|null $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Disease> $diseases
 * @property-read int|null $diseases_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Pharmacy> $pharmacies
 * @property-read int|null $pharmacies_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medicine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medicine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medicine query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medicine whereBrandName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medicine whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medicine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medicine whereDosageForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medicine whereGenericName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medicine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medicine wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medicine whereStrength($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Medicine whereUpdatedAt($value)
 */
	class Medicine extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $doctor_id
 * @property int $patient_id
 * @property string $consult_date
 * @property string $status
 * @property numeric $fee
 * @property string|null $meeting_link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Doctor $doctor
 * @property-read \App\Models\User $patient
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OnlineConsultation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OnlineConsultation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OnlineConsultation query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OnlineConsultation whereConsultDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OnlineConsultation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OnlineConsultation whereDoctorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OnlineConsultation whereFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OnlineConsultation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OnlineConsultation whereMeetingLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OnlineConsultation wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OnlineConsultation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OnlineConsultation whereUpdatedAt($value)
 */
	class OnlineConsultation extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $slug
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $license_no
 * @property int $thana_id
 * @property int|null $country_id
 * @property numeric|null $latitude
 * @property numeric|null $longitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Country|null $country
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Medicine> $medicines
 * @property-read int|null $medicines_count
 * @property-read \App\Models\User $owner
 * @property-read \App\Models\Thana $thana
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pharmacy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pharmacy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pharmacy query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pharmacy whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pharmacy whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pharmacy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pharmacy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pharmacy whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pharmacy whereLicenseNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pharmacy whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pharmacy whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pharmacy wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pharmacy whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pharmacy whereThanaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pharmacy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Pharmacy whereUserId($value)
 */
	class Pharmacy extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $pharmacy_id
 * @property int $medicine_id
 * @property numeric $price
 * @property int $stock
 * @property numeric $discount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Medicine $medicine
 * @property-read \App\Models\Pharmacy $pharmacy
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PharmacyMedicine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PharmacyMedicine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PharmacyMedicine query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PharmacyMedicine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PharmacyMedicine whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PharmacyMedicine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PharmacyMedicine whereMedicineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PharmacyMedicine wherePharmacyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PharmacyMedicine wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PharmacyMedicine whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PharmacyMedicine whereUpdatedAt($value)
 */
	class PharmacyMedicine extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int|null $user_id
 * @property string $keyword
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SearchHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SearchHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SearchHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SearchHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SearchHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SearchHistory whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SearchHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SearchHistory whereUserId($value)
 */
	class SearchHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Disease> $diseases
 * @property-read int|null $diseases_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Symptom newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Symptom newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Symptom query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Symptom whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Symptom whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Symptom whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Symptom whereUpdatedAt($value)
 */
	class Symptom extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $district_id
 * @property string $name
 * @property numeric|null $latitude
 * @property numeric|null $longitude
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\District $district
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thana newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thana newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thana query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thana whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thana whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thana whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thana whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thana whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thana whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Thana whereUpdatedAt($value)
 */
	class Thana extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $role
 * @property string $status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $suspended_at
 * @property string|null $suspension_reason
 * @property string $two_factor_secret
 * @property string $two_factor_recovery_codes
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Bookmark> $bookmarks
 * @property-read int|null $bookmarks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OnlineConsultation> $consultations
 * @property-read int|null $consultations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Doctor> $doctors
 * @property-read int|null $doctors_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Hospital> $hospitals
 * @property-read int|null $hospitals_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Pharmacy> $pharmacies
 * @property-read int|null $pharmacies_count
 * @property-read \HasinHayder\Tyro\Models\UserRole|null $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \HasinHayder\Tyro\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereSuspendedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereSuspensionReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

