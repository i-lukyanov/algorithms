<?php

declare(strict_types=1);

function gradingStudents(array $grades): array
{
    $roundedGrades = [];
    foreach ($grades as $grade) {
        $rest = $grade % 5;
        $roundedGrade = $grade;

        if (
            $grade >= 38
            && ($rest >= 3)
        ) {
            $roundedGrade = $grade - $rest + 5;
        }

        $roundedGrades[] = $roundedGrade;
    }

    return $roundedGrades;
}
