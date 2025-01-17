<?php


declare(strict_types=1);

namespace SyliusMolliePlugin\Form\Extension;

use SyliusMolliePlugin\Form\Type\MollieGatewayConfigType;
use Sylius\Bundle\PayumBundle\Form\Type\GatewayConfigType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Valid;

final class GatewayConfigTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add(
            'mollieGatewayConfig',
            CollectionType::class,
            [
                'entry_type' => MollieGatewayConfigType::class,
                'validation_groups' => ['sylius'],
                'constraints' => [
                    new Valid(),
                ],
            ]
        );
    }

    public static function getExtendedTypes(): array
    {
        return [GatewayConfigType::class];
    }
}
